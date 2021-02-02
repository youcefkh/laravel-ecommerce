@extends('master')
@section('content')
    <div class="row show-item">
        <div class="col-sm-6"> 
            <img src=" {{$item->gallery}} " alt="">
        </div>
        <div class="col-sm-6 details">
            <h2> {{$item->name}} </h2>
            <h3>{{$item->price}}$ </h3>
            <h5>description :</h5> <p>{{$item->description}}</p>
            <h5>Category :</h5> <p>{{$item->category}}</p> 

            <button class="btn btn-primary">Add to cart</button>
            <button class="btn btn-success">Buy now</button>
        </div>
    </div>
@endsection