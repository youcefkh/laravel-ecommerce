<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct() {
        $this->middleware(['auth'])->only(['addToCart']); //a guest user can see the posts but can't create or delete one
    }

    public function index()
    {
        $items = Item::all();
        return view('items', ['items' => $items]);
    }

    public function show($id)
    {
        $item = Item::find($id);
        return view('showItem', ['item' => $item]);
    }

    public function search(Request $req)
    {
        $items = Item::where('name', 'like', '%'.$req['query'].'%')->get();
        
        return view('search', ['items' => $items]);
    }

    public function addToCart(Request $req){
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->item_id = $req->item_id;
        $cart->save();

        return redirect()->back();
    }

    static function cartItems()
    {   
        $user_id = auth()->user()->id;
        $cartItems = Cart::where('user_id', $user_id)->get();
        return $cartItems;
    }
}
