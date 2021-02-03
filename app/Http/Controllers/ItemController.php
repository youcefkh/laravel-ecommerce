<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
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
}
