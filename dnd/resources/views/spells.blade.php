@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<html>
<body style="background-image:url(https://wallpaperaccess.com/full/117898.jpg)"> 
<div style="margin: 20px; display: inline-block; padding: 20px; height: 90px; width: 30%;
 text-align: center; background-color: #3D3131; border: 10px solid black;">
    <h1 align = "center"><font size = "5"; color = #D30909> Dungeons & Dragons</font></h1>
</div>

<div >
    <div class="btn-group">                                         
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Level
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Level</span></a>
        </div>
    </div>
    <div class="btn-group">                                         
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Name
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Name</span></a>
        </div>
    </div>
    <div class="btn-group">                                         
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Class
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Class</span></a>
        </div>
    </div>
    <div class="btn-group">                                         
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Component
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Component</span></a>
        </div>
    </div>
    <div class="btn-group">                                         
        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">School
        <span class = "caret"></span></button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="#">School</span></a>
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
                    <td>{{$spell -> name}}</td>
                    <td>{{$spell -> formattedClasses()}}</td>
                    <td>{{$spell -> components}}</td>
                    <td>{{$spell -> school}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
@endsection
