@extends('layouts.main')
@section('title', 'Products')
@section('content')
<h1>This is pag of products</h1>

    <p>id: {{$product['id']}}     descripiton:{{$product['name']}}    price:{{$product['price']}}</p>


 <a href="/">Home</a>
@endsection