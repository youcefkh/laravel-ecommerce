@extends('master')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($items as $key => $item)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="{{ $key==0 ? 'active' : '' }}"></li>
            @endforeach 
        </ol>
        <div class="carousel-inner">
            @foreach ($items as $key => $item)    
                <div class="carousel-item {{ $key==0 ? 'active' : '' }}">
                    <a href=" {{ route('items.show', $item) }} ">
                        <img src=" {{ $item->gallery }} " class="d-block w-100" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{$item->name}}</h5>
                        <p>{{$item->description}}</p>
                        <p>{{$item->price}}$</p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
    <h2>Trending items</h2>
    <div class="trending-items card-deck ">
        @foreach ($items as $item)
                <x-item :item="$item" />  
        @endforeach
    </div>
{{--     <div class="card-deck trending-items">
        @foreach ($items as $item)
            <div class="card">
                <a href=" {{ route('items.show', $item) }} ">
                    <img src="{{$item->gallery}}" class="card-img-top" alt="...">
                </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                <div class="card-footer">
                    <small class="text-muted price">{{$item->price}}$</small>
                </div>
             </div>
        @endforeach
    </div> --}}
@endsection