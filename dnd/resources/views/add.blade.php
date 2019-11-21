@extends('layout.master')

@section('title', 'Page Title')

@section('content')
app('Illuminate\Http\Request');



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
  <font color="#8B0000"><h1>Add New Spell</h1></font>
</div>
</div>

@if ($error)
<div> <font size="3" color = "red"> <b> Some Required fields are missing! </b> </font></div>
@endif

<div class = whitefont> <font size="3"> <b> CAUTION: Please ensure the information you input into the system is correct.</b></font>
</div>

<br></br>

<div class = whitefont>

<form action="{{url('/api/spell/')}}" method="POST">
	
  <div class="form-group">
	    <label> <b>Spell Name (required)</b> </label>
      <input type="spellname" name="spellname" class="form-control" id="name" placeholder="Spell Name" maxlength="40" >
  </div>

  <div class="form-group">
    <label><b>Level (required)</b></label>
      <select name = "level" placeholder="level" class = "browser-default-disabled custom-select custom-select-lg mb-3">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>
</div>

<div class="form-group">
    <label><b>School (required)</b></label>
    <select name = "type" aria-labelledby="dropdownMenuButton" class = "browser-default custom-select custom-select-lg mb-3">
      @foreach($schools as $school) 
      <option value = "{{($school->school)}}">{{($school->school)}}</option>
      @endforeach
    </select>
  </div>  

  <div class="form-group">
	<label> <b>Casting Time</b></label>
    <input type="castingtime" name="castingtime" class="form-control" id="castingtime" placeholder="Ex: 1 Action, 1 Hour, 1 Minute"maxlength="16"  >
  </div>

 <div class="form-group">
	<label> <b>Duration</b> </label>
    <input type="duration" name="duration" class="form-control" id="duration" placeholder="Ex: 8 Hours, 24 Hours, Instantaneous" maxlength="30"  >
	</div>

<div class="form-group">
  <label> <b>Range</b> </label>
    <input type="rangey" name="range" class="form-control" id="rangey" placeholder="Ex: 30 Feet, 10 Feet" maxlength="25"   >
 </div>

  <div class="form-group">
      <label for="Description"><b>Description</b></label>
      <textarea class="form-control" id="description" name="description" rows="5"></textarea>
  </div>

  <div class="form-group">
	    <label> <b>Materials</b> </label>
      <input type="materials" name="materials" class="form-control" id="description" placeholder="Materials"maxlength="200"  > 
  </div>

  <div class="form-group row">
  
     <div class="col-sm-10">
      <label> <b>Components</b> </label>
       <br>
      
        <div class="form-check-inline checkbox checkbox-inline">
          
              <input  type="checkbox" name="components[]" class="form-check-input" value="V" id="component">
              <label>V</label>
        </div>

        <div class="form-check-inline checkbox checkbox-inline">
            <input  type="checkbox" name="components[]" class="form-check-input" value="S" id="component">
            <label>S</label>
        </div>

        <div class="form-check-inline checkbox checkbox-inline">
            <input  type="checkbox" name="components[]" class="form-check-input" value="M" id="component">
            <label>M</label>
        </div>
       
        </div>
</div> 
<div class="form-group row">
    <fieldset class="form-group">
      <div class="col-sm-12">
	  <label> <b>Non/Ritual</b> </label>
        @foreach($rituals as $ritual)
        <div class="form-check">
          <input class="form-check-input" type="radio" name="ritual" id="select1" value="{{$ritual->ritual}}" checked > 
          <label class="form-check-label" for="gridRadios3">
            {{$ritual->ritual}}
          </label>
        </div>
      @endforeach
      </div>
  </fieldset>
</div>

  <div class="form-group row">
    <fieldset class="form-group">
      <div class="col-sm-12">
      <label> <b>Non/Concentration</b> </label>
          @foreach($concentrations as $concentration)
          <div class="form-check">
            <input class="form-check-input" type="radio" name="concentration" id="select1" value="{{$concentration->concentration}}" checked >
            <label class="form-check-label" for="gridRadios3">
              {{$concentration->concentration}}
            </label>
          </div>
        @endforeach
        </div>
    </fieldset>
  </div>
  
    <div class="form-group row">
    <div class="col-sm-10">
    <label> <b>Select All Classes That Apply: (required)</b> </label>
    <br>@foreach ($classes as $class)
    <label for="inlineCheckbox1"> {{$class->class_name}}  </label>
      <div class="form-check form-check-inline">
                        <input  type="checkbox" name="classes[]" class="form-check-input" value="{{$class->class_id}}" id="class">
      </div>
      
      @endforeach
    </div>
    </div>
       
  <div class="form-group row">
    <div class="col-sm-10" align="center">
    <input type="submit" class="btn btn-danger">
    </div>
  </div>
  </body>
</form>
</div>
@endsection