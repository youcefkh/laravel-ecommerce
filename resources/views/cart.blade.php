@extends('master')
@section('content')
    <div class="custom-product">
        <h2>Cart List</h2>
        <a href="">Filter</a>
        <table class="table table-striped">
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
                @foreach ($items as $key=>$item)    
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td><img src="{{$item->gallery}}" height="40px" width="40px" alt=""></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}$</td>
                        <td title="{{$item->created_at}}">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection