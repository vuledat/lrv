@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">OEM</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key => $pro)
                <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$pro['ten']}}</td>
                    <td>{{$pro['gia']}}</td>
                    <td>{{$pro['sl']}}</td>
                    <td>{{$pro->category->ten}}</td>
                    <td>{{$pro->oem->ten}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection