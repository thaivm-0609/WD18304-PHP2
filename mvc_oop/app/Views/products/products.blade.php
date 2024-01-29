@extends('layouts.admin')
@section('content')

    @auth 
    <!-- user đã đăng nhập -->
    <span>thaivm2</span>
    @endauth

    @guest
    <button>Đăng nhập</button>
    @endguest
    <a href="{{route('login') }}">Login</a>
    <a href="{{route('create-product')}}">Thêm mới</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product['id'] }}</td>
                <td>{{$product['name'] }}</td>
                <td>{{$product['description']}}</td>
                <td>{{$product['price']}}</td>
                <td>{{$product['status']}}</td>
                <td>
                    <a href="{{route('/products/'.$product['id'].'/edit')}}">Edit</a>
                    <a href="">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
