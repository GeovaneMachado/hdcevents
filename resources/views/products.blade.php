@extends('layouts.main')
@section('title', 'Products')
@section('content')
<h1>Products</h1>
<!--- create table of products --->

<table class="table table-hover table-dark">
    <thead class="table-primary">
        <tr>
            <th>Product id</th>
            <th>Product Description</th>
            <th>Product Price</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product['id']}}</td>
            <td>{{$product['name']}}</td>
            <td>{{$product['price']}}</td>
        <tr>
        @endforeach
    </tbody>
</table>
@endsection