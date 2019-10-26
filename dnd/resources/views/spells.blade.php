@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<html>

<div style="margin: 20px; display: inline-block; padding: 20px; height: 90px; width: 30%;
 text-align: center; background-color: #3D3131; border: 10px solid black;">
    <h1 align = "center"><font size = "5"; color = #D30909> Dungeons & Dragons</font></h1>
</div>

<div class="container">                                         
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filter By
    </button>
    <ul class="dropdown-menu">
      <li><a href="#">Level</a></li>
      <li class = "divider"></li>
      <li><a href="#">Name</a></li>
      <li class = "divider"></li>
      <li><a href="#">Class</a></li>
      <li class = "divider"></li>
      <li><a href="#">Component</a></li>
      <li class = "divider"></li>
      <li class = "dropdown submenu"><a href="#">School <span class="caret"></span></a>
        <ul class = "dropdown-menu">
        <li><a href="#">Test</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
<h2> </h2>

<div style="border:3px solid black; height:400px;overflow:auto;">

    <table class = "table table-light table-striped" style = "width:100%;">
        <thead class = "thead thead-dark">
            <tr>
                <th align = "left">Level</th>
                <th align = "left">Name</th>
                <th align = "left">Class</th>
                <th align = "left">Component</th>
                <th align = "left">School</th>
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

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
</html>
@endsection
