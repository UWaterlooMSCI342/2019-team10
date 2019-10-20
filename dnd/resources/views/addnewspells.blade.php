@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<form>
	
  <div class="form-group row">
    <div class="col-sm-10">
	<label for="spellname" class="col-sm-2 col-form-label">Spell Name: </label>
      <input type="spellname" class="form-control" id="spellname" placeholder="Spell Name">
    </div>
	</div>
	  <div class="form-group row">
    <div class="col-sm-10">
	<label for="type" class="col-sm-2 col-form-label">Type: </label>
      <input type="type" class="form-control" id="type" placeholder="Type">
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label for="castingtime" class="col-sm-2 col-form-label">Casting Time: </label>
      <input type="castingtime" class="form-control" id="castingtime" placeholder="Casting Time">
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label for="components" class="col-sm-2 col-form-label">Components: </label>
      <input type="components" class="form-control" id="components" placeholder="Components">
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label for="duration" class="col-sm-2 col-form-label">Duration: </label>
      <input type="duration" class="form-control" id="duration" placeholder="Duration">
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label for="rangey" class="col-sm-2 col-form-label">Range: </label>
      <input type="rangey" class="form-control" id="rangey" placeholder="Range">
    </div>
	</div>
		  <div class="form-group row">
    <div class="col-sm-10">
	<label for="description" class="col-sm-2 col-form-label">Description: </label>
      <input type="description" class="form-control" id="description" placeholder="Description">
    </div>
	</div>

	


  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Ritual/NonRitual</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="grid1" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            Ritual
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="grid1" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Non-Ritual
          </label>
        </div>

      </div>
    </div>
  </fieldset>
    <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Concentration/Non-Concentration</legend>
      <div class="col-sm-10">
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
    <div class="col-sm-2">Select Classes (all that apply)</div>
    <div class="col-sm-10">
	@foreach ($classes as $class)
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
		{{$class}}
        </label>
      </div>
	 @endforeach
    </div>

  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">ADD NEW SPELL</button>
    </div>
  </div>
</form>
@endsection