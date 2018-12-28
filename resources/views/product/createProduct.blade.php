@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{action('ProductController@store')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name input">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" placeholder="Price input">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category">
                    @foreach($category as $cat)
                        <option>{{$cat['ten']}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <input class="btn btn-primary" type="submit" value="ADD">
            </div>
        </form>
    </div>
@endsection