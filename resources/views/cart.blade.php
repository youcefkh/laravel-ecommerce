@extends('master')
@section('content')
    <h2>Cart List</h2>
    @if (!$items->isEmpty())
        <a href="{{route('order')}}"><button class="btn btn-success my-3 order-btn">Order now</button></a>
    @endif
    <table class="table table-striped cart-list">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Add date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($items->isEmpty())
                <tr>
                    <td colspan="6" class="text-center text-danger">
                        You don't have any item in your cart
                    </td>
                </tr>
            @else    
                @foreach ($items as $key=>$item)    
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td><img src="{{$item->gallery}}" height="40px" width="40px" alt=""></td>
                        <td>{{$item->name}}</td>
                        <td class="price">{{$item->price}}$</td>
                        <td title="{{$item->created_at}}">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                        <td><button class="btn btn-danger delete-from-cart" data-id="{{$item->id}}">Delete</button></td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="6" class=" text-center">Total : <span class="total-price text-success">0</span></th>
                </tr>
            @endif
        </tbody>
    </table>
    
@endsection