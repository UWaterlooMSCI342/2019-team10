@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        <table>
            <tr>
                //headings of the table
                <th> Name </th>
                <th> Level </th>
                <th> Type </th>
                <th> Casting Time </th>
                <th> Components </th>
                <th> School </th>
                <th> Classes </th>
            </tr>
            //load data from csv that correspond to each heading
            <tr>
                //content
            </tr>
        </table>

    </body>
</html>
@endsection