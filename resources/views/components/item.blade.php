@props(['item' => $item])

<div class="card my-2">
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
