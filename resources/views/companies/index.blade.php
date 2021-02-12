@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Companies</h4>
                @if(Auth::user()->role == "Admin" or Auth::user()->role == "Manager")
                    <div class="card-toolbar">
                        <ul>
                            <li>
                                <a href="/companies/addcompany">
                                    <button class="btn btn-common btn-rounded"><i class="fas fa-plus"></i></button>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="table-overflow">
                <table class="table table-lg">
                    <thead>
                        <tr class="table-text">
                            <th>Company name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Adreess</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->phone }}</td>
                                <td>{{ $company->country }}</td>
                                <td>{{ $company->city }}</td>
                                <td>{{ $company->address }}</td>
                                <td>
                                    <a href="/companies/profile/{{ $company->id }}"><button class="btn btn-dark btn-rounded">More informations</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <div class="custom-pagination">
                    {{ $companies->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
