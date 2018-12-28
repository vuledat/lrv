@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <button
                id="btn_add"
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#exampleModal"
            >ADD</button>
            <form class="form-inline ml-auto">
                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="search">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">OEM</th>
                <th scope="col" class="text-center">Delete</th>
            </tr>
            </thead>
            <tbody id="products-list">
            @foreach($products as $key => $pro)
            <tr id="product{{$pro->id}}" >
                <th scope="row">{{$key}}</th>
                <td>
                    <a class="open_modal" value="{{$pro->id}}">{{$pro['ten']}}</a>
                </td>
                <td>{{$pro['gia']}}</td>
                <td>{{$pro['sl']}}</td>
                <td>{{$pro->category['ten']}}</td>
                <td>{{$pro->oem['ten']}}</td>
                <td class="text-center"><i class="fa fa-trash delete-item" value="{{$pro->id}}" aria-hidden="true"></i></td>

            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>


    <input id="url" type="hidden" value="{{ \Request::url() }}">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Info</h5>
                    <button type="button" id="btn_add" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="form-group required">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price:</label>
                            <input type="text" class="form-control" id="price">
                        </div>

                        <div class="form-group">
                            <label for="quantity" class="col-form-label">Quantity:</label>
                            <input type="text" class="form-control" id="quantity">
                        </div>
                        <div>
                            <label for="category" class="col-form-label">Category:</label>
                            <select class="form-control" id="category" name="category">
                                @foreach($categories as $key => $cat)
                                    <option value="{{$cat['id']}}">{{$cat['ten']}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="oem" class="col-form-label">OEM:</label>
                            <select class="form-control" id="oem" name="oem">
                                @foreach($oems as $key => $oem)
                                    <option value="{{$oem['id']}}">{{$oem['ten']}}</option>

                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-save" class="btn btn-primary">add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/product.js')}}"></script>
@endsection
