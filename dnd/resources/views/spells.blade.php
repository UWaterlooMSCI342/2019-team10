@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<body style="background-image:url(https://wallpaperaccess.com/full/117898.jpg)"> 
<div style="margin: 20px; display: inline-block; padding: 20px; height: 90px; width: 30%;
 text-align: center; background-color: #3D3131; border: 10px solid black;">
    <h1 align = "center"><font size = "5"; color = #D30909> Dungeons & Dragons</font></h1>
</div>

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
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Class
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($class_names as $class_name) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/classes/' . $class_name->class_name)}}"> {{$class_name->class_name}}  </a>
        @endforeach
        </div>

    </div>

	<div class="btn-group">                                         
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ritual
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($rituals as $ritual) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/ritual/' . $ritual->ritual)}}"> {{$ritual->ritual}}  </a>
        @endforeach
        </div>
    </div>
	
	<div class="btn-group">                                         
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Concentration
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($concentrations as $concentration) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/concentration/' . $concentration->concentration)}}"> {{$concentration->concentration}}  </a>
        @endforeach
        </div>
    </div>
	
    <div class="btn-group">                                         
        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">School
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($schools as $school) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/school/' . $school->school)}}"> {{$school->school}}</a>
        @endforeach
        </div>
    </div>
		
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#Modal">
  Advanced Filter
</button>
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
<select name = "level" class = "browser-default custom-select custom-select-lg mb-3">
		@foreach($levels as $level) 
		<option value = "{{($level->level)}}">{{($level->level)}}</option>
		@endforeach
    </select>

 <select name = "class_name" class = "browser-default custom-select custom-select-lg mb-3">
		@foreach($class_names as $class_name) 
		<option value = "{{($class_name->class_name)}}">{{($class_name->class_name)}}</option>
		@endforeach
    </select>
	<select name = "ritual" class = "browser-default custom-select custom-select-lg mb-3">
		@foreach($rituals as $ritual) 
		<option value = "{{($ritual->ritual)}}">{{($ritual->ritual)}}</option>
		@endforeach
    </select>
	<select name = "concentration" class = "browser-default custom-select custom-select-lg mb-3">
		@foreach($concentrations as $concentration) 
		<option value = "{{($concentration->concentration)}}">{{($concentration->concentration)}}</option>
		@endforeach
    </select>
	<select name = "school" class = "browser-default custom-select custom-select-lg mb-3">
		@foreach($schools as $school) 
		<option value = "{{($school->school)}}">{{($school->school)}}</option>
		@endforeach
    </select>
  
      </div>
      <div class="modal-footer">
	  <input type="submit" value="Submit" class="btn btn-success">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>
    


<br/>
<div style="border:3px solid black; height:400px;overflow:auto;">
    <table class="table table-inverse table-dark">
        <thead>
            <tr>
                <th scope = "col">Level</th>
                <th scope = "col">Name</th>
                <th scope = "col">Class</th>
                <th scope = "col">Ritual</th>
				<th scope = "col">Concentration</th>
                <th scope = "col">School</th>
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
                    <td><a href="{{url('/api/spell/' . $spell -> spell_id)}}" class = "btn">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
		
    </table>
	

	
</div>
</body>
@endsection
