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
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Level
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
        @foreach($class_name as $class_name) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/classes/' . $class_name->class_name)}}"> {{$class_name->class_name}}  </a>
        @endforeach
        </div>

    </div>
    <div class="btn-group">                                         
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Component
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($components as $components) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/components/' . $components->components)}}"> {{$components->components}}</a>
        @endforeach
    </div>

    </div>
    <div class="btn-group">                                         
        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">School
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($school as $school) 
        <a class="dropdown-item" href="{{url('/api/spell/filter/school/' . $school->school)}}"> {{$school->school}}</a>
        @endforeach
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
                <th scope = "col">Component</th>
                <th scope = "col">School</th>
            </tr>
        </thead>
        <tbody>

            @foreach($spells as $spell)
                <tr>
                    <td>{{$spell -> level}}</td>
                    <!-- <td><a href="{{url('/api/spell/detail/' . $spell -> spell_id)}}">{{$spell -> name}}</a></td> -->
                    <td>{{$spell -> formattedClasses()}}</td>
                    <td>{{$spell -> components}}</td>
                    <td>{{$spell -> school}}</td>
                    <!-- <td><a href="{{url('/api/spell/' . $spell -> spell_id)}}" class = "btn">Delete</a></td> -->
                </tr>
            @endforeach
        </tbody>

        


    </table>
</div>
</body>
@endsection
