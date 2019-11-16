@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<html>
<head>

<body> 
<style>
.container {
  position: relative;

}
.spellname_tag{
  position: absolute;
  top:4%;
  Left: 5%;
  color: black;
}
.materials_tag{
  padding-left: 2.5%;
  padding-right: 30%;
  position: absolute;
  top:16%;
  Left: 2.5%;
  color: black;
}
.class_tag{
  position: absolute;
  bottom: 1.75%;
  left: 3%;
  color: white;
}
.school_tag{
  position: absolute;
  top: 1.5%;
  left: 77.5%;
  color: white;
}
.level_tag{
  position: absolute;
  top: 5%;
  right: 12.5%;
  color: white;
}
.duration_tag{
  position: absolute;
  top:24.25%;
  Left: 10%;
  color: black;
}
.castingtime_tag{
  position: absolute;
  top:28.75%;
  Left: 10%;
  color: black;
  
}
.range_tag{
  position: absolute;
  top:24.25%;
  Left: 37%;
  color: black;
}
.concentration_tag{
  position: absolute;
  top:28.75%;
  Left: 37%;
  color: black;
}
.components_tag{
  position: absolute;
  top:24.25%;
  Left: 78%;
  color: black;
}
.ritual_tag{
  position: absolute;
  top:28.75%;
  Left: 78%;
  color: black;
}
.description_tag{
padding-left: 2.5%;
  padding-right: 3.5%;
  position: absolute;
  top:35%;
  Left: 2.5%;
  color: black;
}

.shrink{
transform:scale(0.5);
}
</style>
</head>
@foreach($spells as $spell)
<div class="container">
  <img src="https://i.ibb.co/8mfmYmM/spellcard.jpg"style="width:100%">
  <div class="spellname_tag">
  <h1>{{$spell -> name}}</h1>
  </div>
  <div class="materials_tag">
    <h3>{{$spell -> materials}}</h3>
  </div>
  <div class="description_tag">
  <h3>{{$spell -> description}}</h3>
  </div>
  <div class="class_tag">
    <h3>{{$spell -> formattedClasses()}}</h3>
  </div>
  
  <div class="school_tag">
    <h3>{{$spell -> school}}</h3>
  </div>
  <div class="level_tag">
  <font size="+15">{{$spell -> level}}</font>
  </div>
  <div class="duration_tag">
  <h3>{{$spell -> duration}}</h3>
  </div>
  <div class="castingtime_tag">
  <h3>{{$spell -> casting_time}}</h3>
  </div>
  <div class="range_tag">
  <h3>{{$spell -> range}}</h3>
  </div>
  <div class="concentration_tag">
  <h3>{{$spell -> concentration}}</h3>
  </div>
  <div class="components_tag">
  <h3>{{$spell -> components}}</h3>
  </div>
  <div class="ritual_tag">
  <h3>{{$spell -> ritual}}</h3>
  </div>
</div>
@endforeach
</body>
</html>

@endsection 