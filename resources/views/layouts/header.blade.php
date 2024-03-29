<?php
  use App\Http\Controllers\ItemController;
  if(auth()->user()){
    $totalItems = ItemController::cartItems()->count();
  }
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light px-5 mb-5">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('myOrders') }}"">Orders</a>
        </li>
        <li class="nav-item">
          <form class="form-inline" method="get" action=" {{route('search')}} ">
            @csrf
            <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search" name="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </li>
      </ul>
      
      <ul class="navbar-nav my-2 my-lg-0">
        @auth
            <li class="nav-item">
                <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cart') }}">Cart (<span class="nbr_items">{{$totalItems}}</span>)</a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post" class="logout">
                    @csrf
                    <button type="submit" class="">Logout</button>
                </form>
            </li>
        @endauth

        @guest
            <li class="nav-item">
                <a class="nav-link" href=" {{ route('login') }} ">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Register</a>
            </li>
        @endguest
        
      </ul>
    </div>
</nav>