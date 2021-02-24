<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Warehouse;
use App\Models\Category;
use App\Models\Location;


class WarehouseController extends Controller
{
    public function index() {
        $items = Warehouse::orderBy('created_at', 'ASC')->paginate(10);
        return view('warehouse.index')->with('items', $items);
    }

    public function categoryindex() {
        $category = Category::orderBy('created_at', 'ASC')->paginate(10);
        return view('warehouse.category')->with('category', $category);
    }
    public function locationindex() {
        $location = Location::orderBy('created_at', 'ASC')->paginate(10);
        return view('warehouse.location')->with('location', $location);
    }

    public function additem() {
        return view('warehouse.add-item');
    }

    public function addcategory() {
        return view('warehouse.add-category');
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

    public function storecategory(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect('/warehouse/category');
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

    public function editcategory($id) {
        $category = Category::find($id);
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            return view('warehouse.edit-category')->with('category', $category);
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

    public function categoryupdate(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $category = Category::find($id);
            $category->name = $request->input('name');
            $category->save();

            return redirect('/warehouse/category');
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

    public function destroycategory($id) {
        if(Auth::user()->role == "Admin") {
            $category = Category::find($id);
            $category->delete();
            return redirect('/warehouse/category');
        }
        else {
            return redirect('/');
        }
    }
}
