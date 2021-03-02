<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class ProfileController extends Controller
{
    public function index() {
        $employees = User::orderBy('role', 'ASC')->paginate(10);
        return view('employees.index')->with('employees', $employees);
    }

    public function addemployee() {
        if(Auth::user()->role == "Admin") {
            return view('employees.create');
        }
        else {
            return redirect('/');
        }
    }

    public function store(Request $request) {
        if(Auth::user()->role == "Admin") {
            $this->validate($request, [
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required'
            ]);

            $employee = new User;
            $employee->name = $request->input('name');
            $employee->lastname = $request->input('lastname');
            $employee->gender = $request->input('gender');
            $employee->email = $request->input('email');
            $employee->phone = $request->input('phone');
            $employee->birthday = $request->input('birthday');
            $employee->password = Hash::make($request->input('password'));
            $employee->role = $request->input('role');

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('img/avatar/', $filename);
                $employee->image = '/img/avatar/'.$filename;
            }
            else {
                $employee->image = '/img/avatar/default.png';
            }

            $employee->save();

            Toastr::success('New employee added!');
            return redirect('/employees');
        }
        else {
            return redirect('/');
        }
    }

    public function show($id) {
        $employee = User::find($id);
        if (!User::where('id', $id)->exists()) {
            return redirect('/');
        }
        else {
            return view('employees.show', compact('employee'));
        }
    }

    public function edit($id) {
        if(Auth::user()->role == "Admin" or Auth::user()->id == $id) {
            $employee = User::find($id);
            return view('employees.edit')->with('employee', $employee);
        }
        else {
            return redirect('/');
        }
    }

    public function update(Request $request, $id) {
        if(Auth::user()->role == "Admin" or Auth::user()->id == $id) {
            $this->validate($request, [
                'name' => 'required',
                'lastname' => 'required'
            ]);

            $employee = User::find($id);
            $employee->name = $request->input('name');
            $employee->lastname = $request->input('lastname');
            $employee->gender = $request->input('gender');
            $employee->phone = $request->input('phone');
            $employee->birthday = $request->input('birthday');

            if(isset($request->image)) {
                if ($request->hasfile('image')) {
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('img/avatar/', $filename);
                    $employee->image = '/img/avatar/'.$filename;
                }
            }

            $employee->save();

            Toastr::success('Employee updated!');
            return redirect('/employees/profile/'.$employee->id);
        }
        else {
            return redirect('/');
        }
    }

    public function changepassword($id) {
        if(Auth::user()->role == "Admin" or Auth::user()->id == $id) {
            $employee = User::find($id);
            return view('employees.change-password')->with('employee', $employee);
        }
        else {
            return redirect('/');
        }
    }

    public function updatepassword(Request $request, $id) {
        if(Auth::user()->role == "Admin" or Auth::user()->id == $id) {
            $this->validate($request, [
                'password' => 'required',
            ]);

            $employee = User::find($id);
            $employee->password = Hash::make($request->input('password'));
            $employee->save();

            Toastr::success('Password updated!');
            return redirect('/employees/profile/'.$employee->id);
        }
        else {
            return redirect('/');
        }
    }

    public function changerole($id) {
        if(Auth::user()->role == "Admin") {
            $employee = User::find($id);
            return view('employees.change-role')->with('employee', $employee);
        }
        else {
            return redirect('/');
        }
    }

    public function updaterole(Request $request, $id) {
        if(Auth::user()->role == "Admin") {
            $this->validate($request, [
                'role' => 'required',
            ]);

            $employee = User::find($id);
            $employee->role = $request->input('role');
            $employee->save();

            Toastr::success('Role updated!');
            return redirect('/employees/profile/'.$employee->id);
        }
        else {
            return redirect('/');
        }
    }

    public function destroy($id){
        if(Auth::user()->role == "Admin") {
            $employee = User::find($id);
            $employee->delete();

            Toastr::error('Employee deleted!');
            return redirect('/employees');
        }
        else {
            return redirect('/');
        }
    }
}
