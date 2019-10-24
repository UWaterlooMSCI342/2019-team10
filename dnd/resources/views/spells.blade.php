@extends('layout.master')

@section('title', 'Page Title')

@section('content')

<html>

<div style="margin: 20px; display: inline-block; padding: 20px; height: 90px; width: 30%;
 text-align: center; background-color: #3D3131; border: 10px solid black;">
<h1 align = "center"><font size = "5"; color = #D30909> Dungeons & Dragons</font></h1>
</div>


<body style="background-image:url(https://wallpaperaccess.com/full/117898.jpg)">
<h2> </h2>


<div style="border:3px solid black; height:400px;overflow:auto;">
<table bgcolor = #B9C3BD style = "width:100%;">
<tr>
    <th align = "left">Level</th>
    <th align = "left">Name</th>
    <th align = "left">Class</th>
    <th align = "left">Component</th>
    <th align = "left">School</th>
</tr>
@foreach($spells as $spell)
    <tr>
    @foreach($attr_to_display as $attr)
        <td>{{$spell -> $attr}}</td>
    @endforeach
    </tr>
@endforeach
</table>
</div>
</body>
</html>
@endsection
