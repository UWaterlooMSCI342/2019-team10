@extends('layout.master')

@section('title', 'Page Title')

@section('content')
<html>
    <head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <style>
body {
    background-image: url("https://images.squarespace-cdn.com/content/v1/51b3dc8ee4b051b96ceb10de/1558559745443-KM38DVM6H0AIJWVJNT1H/ke17ZwdGBToddI8pDm48kJe8VwonRcYgr7f_0UVbdhh7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UbHrcextDeErdIU23wx0_6BTOY9zQNi_nItQjMEsHFYhlvkRmRO1_mFZFNCn67QdSw/ghosts_saltmarsh.jpg?format=2500w ");
        background-repeat:no-repeat;
       background-size:cover;
} 
.whitefont{
 color: #fff;
}
</style>
</head>

    <head>
        <title>App Name - @yield('title')</title> 
        <link href="style.css" rel="stylesheet" type="text/css">
        <style> 
        table, th, td { 
            border: 1px solid black; 
        } 
    </style> 

    </head>
    
    <body>
        <div class="col-sm-20">
        <div style="background:#DCDCDC" class="jumbotron text-center">
            <font color="#8B0000">
                <h1>Spell Details Page</h1>
            </font>
        </div>
        </div>
        

        <div style="background:#DCDCDC;overflow-x: auto;" class="jumbotron text-center">
            <font color="#8B0000">
        
        <table class="no-wrap" style="text-align:left; background-colour:white; border=5;">
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
            @foreach ($details as $details)
                <td>{{$details}}</td>
                @endforeach
            </tr>

        </table>
<br>
</br>
        
        <div style="background:#DCDCDC;overflow-x: auto;" class="jumbotron text-center">
            <font color="#8B0000">
        <table class="no-wrap" style="text-align:left; background-colour:white; border=5;">
            <tr>
                <th> Description </th>
            </tr>

            <tr>
            @foreach ($description as $description)
                <td>{{$description}}</td>
                @endforeach
            </tr>

        </table>
    </div>
    </body>
</html>
@endsection