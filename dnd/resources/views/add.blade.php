@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<head>
  <style>
body {
	background-image: url("https://images.squarespace-cdn.com/content/v1/51b3dc8ee4b051b96ceb10de/1558559745443-KM38DVM6H0AIJWVJNT1H/ke17ZwdGBToddI8pDm48kJe8VwonRcYgr7f_0UVbdhh7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UbHrcextDeErdIU23wx0_6BTOY9zQNi_nItQjMEsHFYhlvkRmRO1_mFZFNCn67QdSw/ghosts_saltmarsh.jpg?format=2500w ");
        background-repeat:no-repeat;
       background-size:cover;
} 
.whitefont{
 color: #fff;
}
</style>
</head>


<body align = 'center'>

<div class="col-sm-10">
<div style="background:#DCDCDC" class="jumbotron text-center">
  <font color="#8B0000"><h1>Add New Spell Page</h1></font>
</div>
</div>

<div class = whitefont>

<form>
	
  <div class="form-group row">
<<<<<<< HEAD
  
  <div class="col-sm-10">
	<label> <b>Spell Name:</b> </label>
      <input type="spellname" class="form-control" id="level" placeholder="Spell Name">
=======

  <!-- creating variables -->

  <!-- $spellname = config('app.spellname');
  $level = config('app.level');
  $type = config('app.Type');
  $castingtime = config('app.castingtime');
  $components = config('app.components');
  $duration = config('app.duration');
  $range = config('app.range');
  $description = config('app.description'); -->
  
  <div class="col-sm-10">
	<label> <b>Spell Name:</b> </label>
      <input type="spellname" name="spellname" class="form-control" id="name" placeholder="Spell Name" $spellname>
    </div>
	</div>
	<div class="form-group row">
	    <div class="col-sm-10">
	<label> <b>Level:</b> </label>
      <input type="level" name="level" class="form-control" id="level" placeholder="Level" $level>
>>>>>>> parent of 678a10a... Working code!
    </div>
	</div>

  <div class="btn-group">                                         
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Level
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($levels as $level) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/level/' . $level->level)}}"> {{($level->level)}}</a>
        @endforeach
        </div>

	  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Type:</b> </label>
<<<<<<< HEAD
      <input type="school" class="form-control" id="school" placeholder="School">
=======
      <input type="type" name="type" class="form-control" id="type" placeholder="Type" $type>
>>>>>>> parent of 678a10a... Working code!
    </div>
    
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Casting Time:</b> </label>
<<<<<<< HEAD
      <input type="castingtime" class="form-control" id="castingtime" placeholder="Casting Time">
=======
      <input type="castingtime" name="castingtime" class="form-control" id="castingtime" placeholder="Casting Time" $castingtime>
>>>>>>> parent of 678a10a... Working code!
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Components:</b> </label>
<<<<<<< HEAD
      <input type="components" class="form-control" id="components" placeholder="Components">
=======
      <input type="components" name="components" class="form-control" id="components" placeholder="Components" $components>
>>>>>>> parent of 678a10a... Working code!
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Duration:</b> </label>
<<<<<<< HEAD
      <input type="duration" class="form-control" id="duration" placeholder="Duration">
=======
      <input type="duration" name="duration" class="form-control" id="duration" placeholder="Duration" $duration>
>>>>>>> parent of 678a10a... Working code!
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Range</b> </label>
<<<<<<< HEAD
      <input type="rangey" class="form-control" id="rangey" placeholder="Range">
=======
      <input type="rangey" name="range" class="form-control" id="rangey" placeholder="Range" $range>
>>>>>>> parent of 678a10a... Working code!
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Description:</b> </label>
<<<<<<< HEAD
      <input type="description" class="form-control" id="description" placeholder="Description">
=======
      <input type="description" name="description" class="form-control" id="description" placeholder="Description" $description> 
>>>>>>> parent of 678a10a... Working code!
    </div>
	</div>

	


    <fieldset class="form-group">
    <div class="row">
	
      <div class="col-sm-10">
	  <label> <b>Non/Ritual:</b> </label>
        <div class="form-check">
<<<<<<< HEAD
          <input class="form-check-input" type="radio" name="grid1" id="select1" value="option3" checked>
=======
          <input class="form-check-input" type="radio" name="ritual" id="select1" value="ritual" checked $ritual> 
>>>>>>> parent of 678a10a... Working code!
          <label class="form-check-label" for="gridRadios3">
            Ritual
          </label>
        </div>
        <div class="form-check">
<<<<<<< HEAD
          <input class="form-check-input" type="radio" name="grid1" id="select2" value="option4">
=======
          <input class="form-check-input" type="radio" name="ritual" id="select2" value="non-ritual" $ritual>
>>>>>>> parent of 678a10a... Working code!
          <label class="form-check-label" for="gridRadios4">
            Non-Ritual
          </label>
        </div>

      </div>
    </div>
  </fieldset>
  
    <fieldset class="form-group">
    <div class="row">
	
      <div class="col-sm-10">
	  <label> <b>Non/Concentration:</b> </label>
        <div class="form-check">
<<<<<<< HEAD
          <input class="form-check-input" type="radio" name="grid2" id="select1" value="option3" checked>
          <label class="form-check-label" for="gridRadios3">
            Concentration
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="grid2" id="select2" value="option4">
          <label class="form-check-label" for="gridRadios4">
            Non-Concentration
          </label>
        </div>
=======
          <input class="form-check-input" type="radio" name="concentration" id="select1" value="concentration" checked $concentration>
          <label class="form-check-label" for="gridRadios3">
            Concentration
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="concentration" id="select2" value="non-concentration" $concentration>
          <label class="form-check-label" for="gridRadios4">
            Non-Concentration
          </label>
        </div>
>>>>>>> parent of 678a10a... Working code!

      </div>
    </div>
  </fieldset>
  
  <div class="form-group row">
	
    <div class="col-sm-10">
	<label> <b>Select All Classes That Apply:</b> </label>
	<br>@foreach ($classes as $class)
	<label for="inlineCheckbox1"> {{$class }}   </label>
	   <div class="form-check form-check-inline">
<<<<<<< HEAD
                        <input type="checkbox" class="styled" id="inlineCheckbox1" value="option1">
=======
                        <input  type="checkbox" class="styled" id="inlineCheckbox1" $_POST[$classes]>
>>>>>>> parent of 678a10a... Working code!
                        
                    </div>
	 @endforeach
    </div>
  </div>
       
  <div class="form-group row">
    <div class="col-sm-10" align="center">
      <a href="{{url('/api/spells')}}" class="btn btn-danger">ADD NEW SPELL</a>
    </div>
  </div>
  </body>
</form>
</div>
@endsection