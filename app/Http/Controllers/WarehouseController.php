<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Warehouse;
use App\Models\Category;
use App\Models\Location;
use Brian2694\Toastr\Facades\Toastr;


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
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            return view('warehouse.add-item');
        }
        else {
            return redirect('/');
        }
    }

    public function addcategory() {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            return view('warehouse.add-category');
        }
        else {
            return redirect('/');
        }
    }

    public function addlocation() {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            return view('warehouse.add-location');
        }
        else {
            return redirect('/');
        }
    }

    public function store(Request $request) {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
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

            Toastr::success('New item added!');
            return redirect('/warehouse');
        }
        else {
            return redirect('/');
        }
    }

    public function storecategory(Request $request) {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $this->validate($request, [
                'name' => 'required',
            ]);

            $category = new Category();
            $category->name = $request->input('name');
            $category->save();

            Toastr::success('New category added!');
            return redirect('/warehouse/category');
        }
        else {
            return redirect('/');
        }
    }

    public function storelocation(Request $request) {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $this->validate($request, [
                'name' => 'required',
            ]);

            $location = new Location();
            $location->name = $request->input('name');
            $location->save();

            Toastr::success('New location added!');
            return redirect('/warehouse/location');
        }
        else {
            return redirect('/');
        }
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
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $item = Warehouse::find($id);
            return view('warehouse.edit-item')->with('item', $item);
        }
        else {
            return redirect('/');
        }
    }

    public function editcategory($id) {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $category = Category::find($id);
            return view('warehouse.edit-category')->with('category', $category);
        }
        else {
            return redirect('/');
        }
    }

    public function editlocation($id) {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $location = Location::find($id);
            return view('warehouse.edit-location')->with('location', $location);
        }
        else {
            return redirect('/');
        }
    }

    public function itemupdate(Request $request, $id) {

        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $this->validate($request, [
                'item_name' => 'required',
                'item_desc' => 'required'
            ]);

            $item = Warehouse::find($id);
            $item->item_name = $request->input('item_name');
            $item->item_desc = $request->input('item_desc');
            $item->category = $request->input('category');
            $item->stock = $request->input('stock');
            $item->price = $request->input('price');
            $item->location = $request->input('location');
            $item->save();

            Toastr::success('Item updated!');
            return redirect('/warehouse/items/' . $item->id);
        }
        else {
            return redirect('/');
        }
    }

    public function categoryupdate(Request $request, $id) {

        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $this->validate($request, [
                'name' => 'required'
            ]);

            $category = Category::find($id);
            $category->name = $request->input('name');
            $category->save();

            Toastr::success('Category updated!');
            return redirect('/warehouse/category');
        }
        else {
            return redirect('/');
        }
    }

    public function locationupdate(Request $request, $id) {

        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $this->validate($request, [
                'name' => 'required'
            ]);

            $location = Location::find($id);
            $location->name = $request->input('name');
            $location->save();

            Toastr::success('Location updated!');
            return redirect('/warehouse/location');
        }
        else {
            return redirect('/');
        }
    }

    public function destroyitem($id) {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $item = Warehouse::find($id);
            $item->delete();

            Toastr::error('Item deleted!');
            return redirect('/warehouse');
        }
        else {
            return redirect('/');
        }
    }

    public function destroycategory($id) {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $category = Category::find($id);
            $category->delete();

            Toastr::error('Category deleted!');
            return redirect('/warehouse/category');
        }
        else {
            return redirect('/');
        }
    }

    public function destroylocation($id) {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper") {
            $location = Location::find($id);
            $location->delete();

            Toastr::error('Location deleted!');
            return redirect('/warehouse/location');
        }
        else {
            return redirect('/');
        }
    }
}
