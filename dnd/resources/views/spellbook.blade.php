@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<html>
<head>
<body style="background-image:url(https://wallpaperaccess.com/full/117898.jpg)"> 
<div style="margin: 20px; display: inline-block; padding: 20px; height: 90px; width: 30%;
 text-align: center; background-color: #3D3131; border: 10px solid black;">
    <h1 align = "center"><font size = "5"; color = #D30909> Dungeons & Dragons</font></h1>
</div>

<div>

    <div class="btn-group">                                         
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Spellbook
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        @foreach($name as $name) 
        <a class="dropdown-item" href="{{url('/api/SpellBook/filter/spell_book_id/' . $name->name)}}"> {{$name->name}}</a>
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
    </table>
</div>
</head>
</body>
</html>

@endsection 