@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<ul>
    @foreach ($spells as $spell)
        <li>{{ $spell -> name }}</li>
    @endforeach
</ul>
@endsection