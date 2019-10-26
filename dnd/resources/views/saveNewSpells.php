@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<ol>
    @foreach ($spells as $spell)
        <li>
            @foreach ($attr_to_display as $attr)
                <p><strong>{{$attr}}:</strong> {{ $spell->$attr }}</p>
            @endforeach
        </li>
    @endforeach
</ol>
@endsection

//Need to save spells from the add new spells page to the db 
// but new spells have not been added to the DB yet

<body>
<?php
// Enable error logging:
error_reporting(E_ALL ^ E_NOTICE);
// mysqli connection via user-defined function
//establishes a connection with database
include('./config.php');
$mysqli = get_mysqli_conn();
$spellname = stripcslashes($_POST['spellname']);
$type = stripcslashes($_POST['type']);
$castingtime = stripcslashes($_POST['castingtime']);
$duration = stripcslashes($_POST['duration']);
$rangey = stripcslashes($_POST['rangey']);
$description = stripcslashes($_POST['description']);


if($spellname && $type && $castingtime && $duration && $rangey && $description ){
//Change table name 
    $query = "INSERT INTO USERS (spellname, type, castingtime,duration, rangey, description) VALUES (?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('sss', $spellname, $type, $castingtime,$duration, $rangey, $description );
if ($stmt->execute()){
    header("Location: welcome.php?spellname=$spellname");
  }
  else{
    echo '<h1>Failure!</h1>';
  }
  $stmt->close();
          
  }
  else{
      echo '<h1>Please enter all required fields</h1>';
  }	
  ?>

</body>
@endsection




