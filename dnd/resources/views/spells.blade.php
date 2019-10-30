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
<form action = "{{url('/api/spell/filter/multifilter')}}" method = "POST">	
<select name = "level" class = "browser-default custom-select custom-select-lg mb-3">
		@foreach($level as $level) 
		<option value = "{{($level->level)}}">{{($level->level)}}</option>
		@endforeach
    </select>
 <select name = "class_name" class = "browser-default custom-select custom-select-lg mb-3">
		@foreach($class_name as $class_name) 
		<option value = "{{($class_name->class_name)}}">{{($class_name->class_name)}}</option>
		@endforeach
    </select>
	<select name = "ritual" class = "browser-default custom-select custom-select-lg mb-3">
		@foreach($ritual as $ritual) 
		<option value = "{{($ritual->ritual)}}">{{($ritual->ritual)}}</option>
		@endforeach
    </select>
	<select name = "concentration" class = "browser-default custom-select custom-select-lg mb-3">
		@foreach($concentration as $concentration) 
		<option value = "{{($concentration->concentration)}}">{{($concentration->concentration)}}</option>
		@endforeach
    </select>
	<select name = "school" class = "browser-default custom-select custom-select-lg mb-3">
		@foreach($school as $school) 
		<option value = "{{($school->school)}}">{{($school->school)}}</option>
		@endforeach
    </select>
  <input type="submit" value="Submit">
</form>
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
