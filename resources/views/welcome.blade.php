@extends('layouts.main')

@section('title', 'Home')

@section('content')
<h1>This is pag of home</h1>
@if ($name == 'Geovane')
    <p>Welcome {{$name}}!<br>Age: {{$age}}</p>
    @foreach ($namesArray as $item)
        <p>{{$item}}</p>
    @endforeach

@else
    <p>Pleaase input your name: <input type="text"></p>
@endif

@endsection