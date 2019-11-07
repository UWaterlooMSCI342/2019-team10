@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<html>
<head>
<body style="background-image:url(https://wallpaperaccess.com/full/117898.jpg)"> 
<div style="margin: 20px; display: inline-block; padding: 20px; height: 90px; width: 30%;
 text-align: center; background-color: #3D3131; border: 10px solid black;">
    <a href="{{url('/api/spells')}}"><h1 align = "center"><font size = "5"; color = #D30909> Dungeons & Dragons</font></h1></a>
</div>

<div>

    <div class="btn-group">                                         
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Spellbook
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($name as $name) 
        <a class="dropdown-item" href="#"> {{$name->name}}</a>
        @endforeach
        </div>
    </div>

</div>
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
                        <td><a href="{{url('/api/spell/detail/' . $spell -> spell_id)}}">{{$spell -> name}}</a></td>
                        <td>{{$spell -> formattedClasses()}}</td>
                        <td>{{$spell -> components}}</td>
                        <td>{{$spell -> school}}</td>
                        <td><a href="{{url('/api/spell/' . $spell -> spell_id)}}" class = "btn btn-primary">Delete</a></td>
                        <td style="text-align:center;"></td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</div>
</head>
</body>
</html>

@endsection 