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
        return view('warehouse.add-item');
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

    public function showitem($id) {
        $item = Warehouse::find($id);
        if (!Warehouse::where('id', $id)->exists()) {
            return redirect('/');
        }
        else {
            return view('warehouse.item-show', compact('item'));
        }
    }

    public function edititem($id) {
        $item = Warehouse::find($id);
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            return view('warehouse.edit-item')->with('item', $item);
        }
        else {
            return redirect('/');
        }
    }

    public function itemupdate(Request $request, $id) {
        $this->validate($request, [
            'item_name' => 'required',
            'item_desc' => 'required'
        ]);

        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $item = Warehouse::find($id);
            $item->item_name = $request->input('item_name');
            $item->item_desc = $request->input('item_desc');
            $item->category = $request->input('category');
            $item->stock = $request->input('stock');
            $item->price = $request->input('price');
            $item->location = $request->input('location');
            $item->save();

            return redirect('/warehouse/items/' . $item->id);
        }
        else {
            return redirect('/');
        }
    }

    public function destroyitem($id) {
        if(Auth::user()->role == "Admin") {
            $item = Warehouse::find($id);
            $item->delete();
            return redirect('/warehouse');
        }
        else {
            return redirect('/');
        }
    }
}
