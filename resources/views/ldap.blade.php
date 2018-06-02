<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="navbar navbar-default"></div>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
    {{dd($users)}}
        @foreach($users as $user)
        <tr>
            <td>{{$user->name[0]}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
