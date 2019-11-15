@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<html>
<head>
<body style="background-image:url(https://wallpaperaccess.com/full/117898.jpg)"> 
<div style="margin: 20px; display: inline-block; padding: 20px; height: 90px; width: 30%;
 text-align: center; background-color: #3D3131; border: 10px solid black;">
    <a href="{{url('/api/spells/')}}"><h1 align = "center"><font size = "5"; color = #D30909>Dungeons & Dragons</font></h1></a>
</div>
<div>
    <div class="btn-group">
        @if($selected_spellbook != null)                                    
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$selected_spellbook->name}}
            <span class = "caret"></span></button>
            <a style="color: inherit;" href="{{url('api/spellbook/' . $selected_spellbook->spell_book_id . '/delete')}}"><button type="button" class="btn btn-danger" style="margin-left:8px;">Delete Spellbook</button></a>
        @else
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Spellbook
            <span class = "caret"></span></button>
        @endif
        <div class="dropdown-menu">
        @foreach($spellbooks as $spellbook) 
            <a class="dropdown-item" href="{{url('api/spellbooks/' . $spellbook->spell_book_id)}}"> {{$spellbook->name}}</a>
        @endforeach
        </div>

    </div>
		<div class="btn-group">
		<a href="{{url('/api/spellbook/export/' . $selected_spellbook->spell_book_id)}}" class="btn btn-primary">Export to Pdf</a>
		</div>
</div>
<div style="height:400px;overflow:auto;">
    <table class="table table-inverse table-dark">
        <thead>
            <tr>
                <th scope = "col">Level</th>
                <th scope = "col">Name</th>
                <th scope = "col">Class</th>
                <th scope = "col">Component</th>
                <th scope = "col">School</th>
                <th scope = "col">Delete</th>
            </tr>
        </thead>

        @if (!empty($starting_spells))
        <tbody>
            @foreach($starting_spells as $spell)
            <tr>
                <td>{{$spell -> level}}</td>
                <td><a href="{{url('/api/spell/detail/' . $spell -> spell_id)}}">{{$spell -> name}}</a></td>
                <td>{{$spell -> formattedClasses()}}</td>
                <td>{{$spell -> components}}</td>
                <td>{{$spell -> school}}</td>
                <td><a href="{{url('api/spellbook/' . $selected_spellbook->spell_book_id . '/delete/spell/' . $spell -> spell_id)}}" class = "btn btn-primary">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else

    </table>
    <div style="display: inline-block; padding: 20px; height: 90px; width: 30%; text-align: center; background-color: #282828;">
        <font  size = "5"; color = #D30909><h4> No spells are added to this spellbook </h4></font>
    </div>
    @endif
</div>
</head>
</body>
</html>

@endsection 