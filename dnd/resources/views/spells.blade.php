@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<ol>
    @foreach ($spells as $spell)
        <li>
            @foreach ($attr_to_display as $attr)
                <p><strong>{{$attr}}:</strong> {{ $spell->$attr }}</p>
            @endforeach
        </li>
    @endforeach
</ol>
@endsection