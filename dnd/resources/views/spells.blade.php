@extends('layout.master')

@section('title', 'Page Title')

@section('content')

<body style="background-image:url(https://wallpaperaccess.com/full/117898.jpg)"> 
<div style="margin: 20px; display: inline-block; padding: 20px; height: 90px; width: 30%;
 text-align: center; background-color: #3D3131; border: 10px solid black;">
    <a href="{{url('/api/spells')}}"><h1 align = "center"><font size = "5"; color = #D30909> Dungeons & Dragons</font></h1></a>
</div>


<script>
    var checker = 0 
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked")== true){
                checker = checker + 1; 
            }
            else if($(this).prop("checked")==false){
                checker = checker -1; 
            } 
            if(checker > 0){
                $("#addToSpellbook").attr("disabled", false);
            }else{
                $("#addToSpellbook").attr("disabled", true);
            }   
        });
    });
</script>

<div>

	
    <div class="btn-group">                                         
        <a href="{{url('/api/add')}}" class="btn btn-primary">Add Spell</a>
        </div>
<div class="btn-group">                                         
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Level
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($levels as $level) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/level/' . $level->level)}}"> {{($level->level)}}</a>
        @endforeach
        </div>
     
    </div>

    <div class="btn-group">                                         
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Class
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($classes as $class) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/class/' . $class->class_id)}}"> {{$class->class_name}}  </a>
        @endforeach
        </div>

    </div>

	<div class="btn-group">                                         
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ritual
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($rituals as $ritual) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/ritual/' . $ritual->ritual)}}"> {{$ritual->ritual}}  </a>
        @endforeach
        </div>
    </div>
	
	<div class="btn-group">                                         
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Concentration
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($concentrations as $concentration) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/concentration/' . $concentration->concentration)}}"> {{$concentration->concentration}}  </a>
        @endforeach
        </div>
    </div>
	
    <div class="btn-group">                                         
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">School
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($schools as $school) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/school/' . $school->school)}}"> {{$school->school}}</a>
        @endforeach
        </div>
    </div>
		
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
  Advanced Filter
</button>
<div class="btn-group">                                         
        <a href="{{url('/api/spellbooks')}}" class="btn btn-danger">View Spellbooks</a>
  </div>
  
</div>



<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Advanced Filter Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "{{url('/api/spell/filter/multifilter')}}" method = "POST">	
        
<label><b>Level:</b></label>
<select name = "level" class = "browser-default custom-select custom-select-lg mb-3">
		<option selected value = "Any"> -- Any -- </option>
		@foreach($levels as $level) 
		<option value = "{{($level->level)}}">{{($level->level)}}</option>
		@endforeach
    </select>
<label><b>Class:</b></label>
 <select name = "class" class = "browser-default custom-select custom-select-lg mb-3">
		<option selected value = "Any"> -- Any -- </option>
		@foreach($classes as $class) 
		<option value = "{{($class->class_id)}}">{{($class->class_name)}}</option>
		@endforeach
    </select>
<label><b>Ritual:</b></label>
	<select name = "ritual" class = "browser-default custom-select custom-select-lg mb-3">
	<option selected value = "Any"> -- Any -- </option>
		@foreach($rituals as $ritual) 
		<option value = "{{($ritual->ritual)}}">{{($ritual->ritual)}}</option>
		@endforeach
    </select>
<label><b>Concentration:</b></label>
	<select name = "concentration" class = "browser-default custom-select custom-select-lg mb-3">
	<option selected value = "Any"> -- Any -- </option>
		@foreach($concentrations as $concentration) 
		<option value = "{{($concentration->concentration)}}">{{($concentration->concentration)}}</option>
		@endforeach
    </select>
<label><b>School:</b></label>
	<select name = "school" class = "browser-default custom-select custom-select-lg mb-3">
	<option selected value = "Any"> -- Any -- </option>
		@foreach($schools as $school) 
		<option value = "{{($school->school)}}">{{($school->school)}}</option>
		@endforeach
    </select>
  
      </div>
      <div class="modal-footer">
	  <input type="submit" value="Submit" class="btn btn-success">
      <button type="button" class="btn btn-danger" data-dismiss="modal" href="{{url('/api/spells')}}">Close</button>
      </div>
</form>
    </div>
  </div>
</div>

<br/>
<form action="{{url('/api/spellbook/add')}}" method="POST">
    <div class="btn-group wrapper" style="text-align:right, position: absolute;">                                         
        <button type = "button" href = "#" style = "color: white;" id = "addToSpellbook" class="btn btn-success btn-large" data-toggle="modal" data-target="#spellbookModal" value = "addToSpell" disabled = "disabled"> Add to Spellbook </button>
    </div>

    <div style="height:400px;overflow:auto;">
        <table class="table table-striped table-dark w-auto" style = "font-size: 14px">
            <thead>
                <tr>
                    <th scope = "col">Level</th>
                    <th scope = "col">Name</th>
                    <th scope = "col">Class</th>
                    <th scope = "col">Ritual</th>
                    <th scope = "col">Concentration</th>
                    <th scope = "col">School</th>
                    <th scope = "col">Delete</th>
                    <th scope = "col">Add to Spellbook</th>

                </tr>
            </thead>
            <tbody>

                @foreach($spells as $spell)
                    <tr>
                        <td>{{$spell -> level}}</td>
                        <td><a href="{{url('/api/spell/detail/' . $spell -> spell_id)}}">{{$spell -> name}}</a></td>
                        <td>{{$spell -> formattedClasses()}}</td>
                        <td>{{$spell -> ritual}}</td>
                        <td>{{$spell -> concentration}}</td>
                        <td>{{$spell -> school}}</td>

                        <td>
                        <a href="{{url('/api/spell/' . $spell -> spell_id)}}" onclick="return confirm('Are you sure you want to delete this spell?');" class = "btn btn-primary" id = "delete_button">Delete</a>                        </td>


                        
                        <td style="text-align:center;">
                            <div class="form-check" >
                                <input onclick=getValue() type="checkbox" name="spells[]" class="checks" value="{{$spell->spell_id}}" style="width:20px;height:20px;">
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include("spellbook", ["spellbook" => $spellbooks])
</form>
</body>
@endsection