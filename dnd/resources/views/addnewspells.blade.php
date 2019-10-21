@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <style>
body {
	background-image: url("https://images.squarespace-cdn.com/content/v1/51b3dc8ee4b051b96ceb10de/1558559745443-KM38DVM6H0AIJWVJNT1H/ke17ZwdGBToddI8pDm48kJe8VwonRcYgr7f_0UVbdhh7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UbHrcextDeErdIU23wx0_6BTOY9zQNi_nItQjMEsHFYhlvkRmRO1_mFZFNCn67QdSw/ghosts_saltmarsh.jpg?format=2500w ");
        background-repeat:no-repeat;
       background-size:cover;
} 
.transparentbox{
 color: #fff;
}
</style>
</head>


<body>

<div class="col-sm-10">
<div style="background:#DCDCDC" class="jumbotron text-center">
  <font color="#8B0000"><h1>Add New Spell Page</h1></font>
</div>
</div>

<div class = transparentbox>

<form>
	
  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Spell Name:</b> </label>
      <input type="spellname" class="form-control" id="spellname" placeholder="Spell Name">
    </div>
	    <div class="col-sm-10">
	<label> <b>Level:</b> </label>
      <input type="spellname" class="form-control" id="level" placeholder="Level">
    </div>
	</div>
	  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Type:</b> </label>
      <input type="type" class="form-control" id="type" placeholder="Type">
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Casting Time:</b> </label>
      <input type="castingtime" class="form-control" id="castingtime" placeholder="Casting Time">
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Components:</b> </label>
      <input type="components" class="form-control" id="components" placeholder="Components">
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Duration:</b> </label>
      <input type="duration" class="form-control" id="duration" placeholder="Duration">
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Range</b> </label>
      <input type="rangey" class="form-control" id="rangey" placeholder="Range">
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label> <b>Description:</b> </label>
      <input type="description" class="form-control" id="description" placeholder="Description">
    </div>
	</div>

	


    <fieldset class="form-group">
    <div class="row">
	
      <div class="col-sm-10">
	  <label> <b>Non/Ritual:</b> </label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="grid1" id="select1" value="option3" checked>
          <label class="form-check-label" for="gridRadios3">
            Ritual
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="grid1" id="select2" value="option4">
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

      </div>
    </div>
  </fieldset>
  
  <div class="form-group row">
	
    <div class="col-sm-10">
	<label> <b>Select All Classes That Apply:</b> </label>
	<br>@foreach ($classes as $class)
	<label for="inlineCheckbox1"> {{$class }}   </label>
	   <div class="form-check form-check-inline">
                        <input type="checkbox" class="styled" id="inlineCheckbox1" value="option1">
                        
                    </div>
	 @endforeach
    </div>
  </div>
       
  <div class="form-group row">
    <div class="col-sm-10" align="center">
      <button type="submit" class="btn btn-danger"><font color="white">ADD A SPELL</font></button>
    </div>
  </div>
  </body>
</form>
</div>
@endsection