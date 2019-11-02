<?php

namespace App\Console\Commands;

use App\SpellClass;
use App\Spell;
use League\Csv\Reader;

use Illuminate\Console\Command;

/**
 * Class deletePostsCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class ReadInCSVCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "read:csv";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Read in and save csv content to db";

    function file_build_path(...$segments) {
        return join(DIRECTORY_SEPARATOR, $segments);
    }
    
    private function getSpellsFromCsv($csv_path) {
        $reader = Reader::createFromPath($csv_path, 'r');
        $keys = ["name", "level", "school", "ritual",
         "casting_time", "range",	"duration","concentration",
         "components", "materials", "description_length",
         "classes", "description"];
        $spell_from_csv = $reader->fetchAssoc($keys);
        foreach ($spell_from_csv as $row) {
            $spell = new Spell;
            $spell_classes = array();
            foreach ($keys as $attr) {
                if ($attr == 'classes') {
                    $tmp=explode (",", $row[$attr]);
                    foreach ($tmp as $class) {
                        $class = SpellClass::firstOrCreate(['class_name'=>trim($class)]);
                        array_push($spell_classes, $class);
                    }
                } else {
                    $spell->$attr=$row[$attr];
                }
            }
            $spell->save();
            $spell->addClasses($spell_classes);
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $base=__DIR__.DIRECTORY_SEPARATOR;
        $this->getSpellsFromCsv($base.$this->file_build_path("..","..","..", "resources", "csv", "spell_csv.csv"));
    }
}