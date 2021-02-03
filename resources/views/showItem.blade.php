@extends('master')
@section('content')
    <div class="row show-item">
        <div class="col-sm-6"> 
            <img src=" {{$item->gallery}} " alt="">
        </div>
        <div class="col-sm-6 details">
            <h2> {{$item->name}} </h2>
            <h5>description :</h5> <p>{{$item->description}}</p>
            <h5>Category :</h5> <p>{{$item->category}}</p> 
            <h3 class="text-secondary">{{$item->price}}$ </h3>

            <form action=" {{route('add_to_cart')}} " method="POST" class="w-50">
                @csrf
                <input type="hidden" name="item_id" value="{{$item->id}}">
                <button class="btn btn-primary w-100">Add to cart</button>
            </form>
            <button class="btn btn-success w-50">Buy now</button>
        </div>
    </div>
@endsection