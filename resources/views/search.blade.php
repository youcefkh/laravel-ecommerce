@extends('master')

@section('content')
    <h2>results for "{{$_GET['query']}}"</h2>
    <div class="trending-items card-deck ">
        @foreach ($items as $item)
                <x-item :item="$item" />  
        @endforeach
    </div>
@endsection