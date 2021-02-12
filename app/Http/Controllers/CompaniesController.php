<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Companies;

class CompaniesController extends Controller
{
    public function index() {
        $companies = Companies::orderBy('created_at', 'DESC')->paginate(10);
        return view('companies.index')->with('companies', $companies);
    }

    public function addcompany() {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Manager") {
            return view('companies.create');
        }
        else {
            return redirect('/');
        }
    }

    public function store(Request $request) {
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Manager") {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required'
            ]);

            $company = new Companies;
            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->phone = $request->input('phone');
            $company->website = $request->input('website');
            $company->country = $request->input('country');
            $company->city = $request->input('city');
            $company->address = $request->input('address');
            $company->zip_code = $request->input('zip_code');
            $company->bank_name = $request->input('bank_name');
            $company->bank_account = $request->input('bank_account');
            $company->employee_id = Auth::user()->id;
            $company->save();

            return redirect('/companies');
        }
        else {
            return redirect('/');
        }
    }

    public function show($id) {
        $company = Companies::find($id);
        if (!Companies::where('id', $id)->exists()) {
            return redirect('/');
        }
        else {
            return view('companies.show', compact('company'));
        }
    }

    public function edit($id) {
        $company = Companies::find($id);
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Accountant" or Auth::user()->id == $company->employee_id) {
            return view('companies.edit')->with('company', $company);
        }
        else {
            return redirect('/');
        }
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $company = Companies::find($id);
        if(Auth::user()->role == "Admin" or Auth::user()->role == "Accountant" or Auth::user()->id == $company->employee_id) {
            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->phone = $request->input('phone');
            $company->website = $request->input('website');
            $company->country = $request->input('country');
            $company->city = $request->input('city');
            $company->address = $request->input('address');
            $company->zip_code = $request->input('zip_code');
            $company->bank_name = $request->input('bank_name');
            $company->bank_account = $request->input('bank_account');
            $company->employee_id = Auth::user()->id;
            $company->save();

            return redirect('/companies/profile/' . $company->id);
        }
        else {
            return redirect('/');
        }
    }

    public function destroy($id) {
        if(Auth::user()->role == "Admin") {
            $company = Companies::find($id);
            $company->delete();
            return redirect('/companies');
        }
        else {
            return redirect('/');
        }
    }
}
