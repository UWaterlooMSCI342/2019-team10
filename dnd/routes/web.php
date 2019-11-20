<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
 
use App\SpellController;
$router->get('/', 'SpellController@index');

$router->group(['prefix'=>'api'], function() use($router){
	$router->post('/spell/filter/multifilter', 'SpellController@multifilter');  
    $router->get('/spells', 'SpellController@index');
    $router->get('/add', 'SpellController@add');
    $router->get('/add/error', 'SpellController@addError');
    $router->get('/spell/{id}', 'SpellController@dlt');
	$router->get('/new-spells', 'SpellController@addNewSpells');
    $router->get('/spell/{id}', 'SpellController@dlt');
    $router->post('/spell', 'SpellController@NewSave');
    $router->get('/spell/detail/{id}', 'SpellController@spellDetails');
    $router->get('/spell/filter/{filterName}/{filter}', 'SpellController@filter');    
    $router->get('/spellbooks/{id}', 'SpellBookController@viewSpellBook');
    $router->get('/spellbooks', 'SpellBookController@viewSpellBook');
    $router->get('/spellbook/{spellBookId}/delete/spell/{spellId}', 'SpellBookController@dltSpellInSpellBook');
	$router->get('/spellbook/{spellBookId}/delete', 'SpellBookController@dltSpellbook');
    $router->post('/spellbook/add', 'SpellBookController@addSpells');
    $router->get('/spellbook/export/{spellBookId}', 'SpellBookController@export');
});
