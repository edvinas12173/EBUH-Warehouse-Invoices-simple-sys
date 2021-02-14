<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Warehouse;


class WarehouseController extends Controller
{
    public function index() {
        $items = Warehouse::orderBy('created_at', 'ASC')->paginate(10);
        return view('warehouse.index')->with('items', $items);
    }

    public function additem() {
        return view('warehouse.additem');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'item_name' => 'required',
            'item_desc' => 'required'
        ]);

        $item = new Warehouse;
        $item->item_name = $request->input('item_name');
        $item->item_desc = $request->input('item_desc');
        $item->category = $request->input('category');
        $item->stock = $request->input('stock');
        $item->price = $request->input('price');
        $item->location = $request->input('location');
        $item->save();

        return redirect('/warehouse');
    }
}
