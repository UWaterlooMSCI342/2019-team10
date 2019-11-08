@extends('layout.master')

@section('title', 'Page Title')

@section('content')

<body style="background-image:url(https://wallpaperaccess.com/full/117898.jpg)">
<div class="col-sm-20">
<div style="background:#DCDCDC" class="jumbotron text-center">
    <font color="#8B0000">
        <h1>{{$spell->name}}</h1>
    </font>
</div>
</div>
        
<div style="background:#DCDCDC;overflow-x: auto;" class="jumbotron text-center">
    <table class="table table-inverse table-dark" style="text-align:left; background-colour:white; border=5;font-size: 14px;">
        <tr>
            <th> Name </th>
            <th> Level </th>
            <th> School </th>
            <th> Ritual </th>
            <th> Casting Time </th>
            <th> Range </th>
            <th> Duration </th>
            <th> Concentration </th>
            <th> Components </th>
            <th> Materials </th>
            <th> Class </th>
        </tr>
        <tr>
            <td> {{$spell->name}} </td>
            <td> {{$spell->level}} </td>
            <td> {{$spell->school}} </td>
            <td> {{$spell->ritual}} </td>
            <td> {{$spell->casting_time}} </td>
            <td> {{$spell->range}} </td>
            <td> {{$spell->duration}} </td>
            <td> {{$spell->concentration}} </td>
            <td> {{$spell->components}} </td>
            <td> {{$spell->materials}} </td>
            <td> {{$spell->formattedClasses()}} </td>
        </tr>
    </table>
</br>
    <div style="background:#DCDCDC;overflow-x: auto;">
        <font color="#8B0000">
            <h3 align="left" >Description</h3>
        </font>
        <blockquote align="left" class="blockquote">
            <p class="mb-0">{{$spell->description}}</p>
        </blockquote>
    </div>
</div>
</body>
@endsection