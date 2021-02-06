<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return redirect()->back()->with('msg', "1 item added to your cart");
    }

    static function cartItems()
    {   
        $user_id = auth()->user()->id;
        $cartItems = Cart::where('user_id', $user_id)->get();
        return $cartItems;
    }

    public function cartList()
    {   
        $items = DB::table('cart')
        ->join('items', 'cart.item_id', '=', 'items.id')
        ->where('cart.user_id', auth()->user()->id)
        ->select('items.*', 'cart.created_at')
        ->get();

        /* $items_id = Cart::where('user_id', auth()->user()->id)->get('item_id');
        $items = Item::findMany($items_id); */
        //return $items;
        return view('cart', ['items' => $items]);
    }

    public function order()
    {
        $total = DB::table('cart')
        ->join('items', 'cart.item_id', '=', 'items.id')
        ->where('cart.user_id', auth()->user()->id)
        ->sum('items.price');

        return view('order', ["total" => $total]);
    }

    public function storeOrder(Request $req)    
    {
        $user = auth()->user()->id;
        $items = Cart::where('user_id', $user)->get();
        foreach($items as $item){
            $order = new Order;
            $order->user_id = $user;
            $order->item_id = $item->item_id;
            $order->address = $req->address;
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->save();
        }
        Cart::where('user_id', $user)->delete();
        return redirect()->back()->with('msg', "Your oder has been made successfully");
    }

    public function myOrders()
    {
        $orders = DB::table('orders')
        ->join('items', 'orders.item_id', '=', 'items.id')
        ->where('orders.user_id', auth()->user()->id)
        ->select('items.*', 'orders.*')
        ->get();

        return view('myOrders', ["orders" => $orders]);
    }

    public function ajax(Request $req)
    {
        $user = auth()->user()->id;
        Cart::where('item_id' , $req->id)->where('user_id', $user)->delete() ;
    }
}
