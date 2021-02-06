@extends('master')
@section('content')
    <h2>My Orders</h2>
    <table class="table table-striped cart-list">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Add date</th>
            <th scope="col">Delivery status</th>
            </tr>
        </thead>
        <tbody>
            @if ($orders->isEmpty())
                <tr>
                    <td colspan="6" class="text-center text-danger">
                        You don't have any order in your cart
                    </td>
                </tr>
            @else    
                @foreach ($orders as $key=>$order)    
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td><img src="{{$order->gallery}}" height="40px" width="40px" alt=""></td>
                        <td>{{$order->name}}</td>
                        <td class="price">{{$order->price}}$</td>
                        <td title="{{$order->created_at}}">{{\Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</td>
                        <td>{{$order->payment_status}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="6" class=" text-center">Total : <span class="total-price text-success">0</span></th>
                </tr>
            @endif
        </tbody>
    </table>
    
@endsection