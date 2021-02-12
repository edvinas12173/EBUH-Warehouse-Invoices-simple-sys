@extends('layouts.main')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="media align-items-center py-3 mb-3">
                <div>
                    <h4 class="font-weight-bold mb-0">{{ $company->name }}</h4>
                    <div class="text-muted mb-2">ID: {{ $company->id }}, Created by: {{ $company->created_by->name }} {{ $company->created_by->lastname }}</div>
                    @if(Auth::user()->role == "Admin" or Auth::user()->role == "Accountant" or Auth::user()->id == $company->employee_id)
                        <a href="/companies/profile/{{ $company->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                    @endif
                    @if(Auth::user()->role == "Admin")
                        <form action="{{ route('destroycompany', $company->id) }}" method="POST" class="form-display">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="table-overflow">
                <table class="table user-view-table m-0">
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td><b>{{ $company->name }}</b></td>
                        <td>Email:</td>
                        <td><b>{{ $company->email }}</b></td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td><b>{{ $company->phone }}</b></td>
                        <td>Website:</td>
                        <td><b>{{ $company->website }}</b></td>
                    </tr>
                    <tr>
                        <td>Country:</td>
                        <td><b>{{ $company->country }}</b></td>
                        <td>City:</td>
                        <td><b>{{ $company->city }}</b></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><b>{{ $company->address }}</b></td>
                        <td>Zip code:</td>
                        <td><b>{{ $company->zip_code }}</b></td>
                    </tr>
                    <tr>
                        <td>Bank name:</td>
                        <td><b>{{ $company->bank_name }}</b></td>
                        <td>Bank account:</td>
                        <td><b>{{ $company->bank_account }}</b></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h4 class="font-weight-bold mb-3">Invoices</h4>
            <div class="table-overflow">
                <table class="table user-view-table m-0">
                <thead>
                    <tr class="table-text">
                        <th>Invoice ID</th>
                        <th>Created date</th>
                        <th>Amount</th>
                        <th>Due date</th>
                        <th>Status</th>
                        <th>Created by</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Inv-2021-1</td>
                        <td>02/02/2021</td>
                        <td>$1020,2</td>
                        <td>20/02/2021</td>
                        <td>
                            <span class="badge badge-success">Paid</span>
                        </td>
                        <td>Edvinas Valentinovicius</td>
                        <td>
                            <a href="">
                                <button class="btn btn-dark btn-rounded">Click</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Inv-2021-1</td>
                        <td>02/02/2021</td>
                        <td>$1020,2</td>
                        <td>20/02/2021</td>
                        <td>
                            <span class="badge badge-danger">Canceled</span>
                        </td>
                        <td>Edvinas Valentinovicius</td>
                        <td>
                            <a href="">
                                <button class="btn btn-dark btn-rounded">Click</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Inv-2021-1</td>
                        <td>02/02/2021</td>
                        <td>$1020,2</td>
                        <td>20/02/2021</td>
                        <td>
                            <span class="badge badge-warning">Waiting</span>
                        </td>
                        <td>Edvinas Valentinovicius</td>
                        <td>
                            <a href="">
                                <button class="btn btn-dark btn-rounded">Click</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Inv-2021-1</td>
                        <td>02/02/2021</td>
                        <td>$1020,2</td>
                        <td>20/02/2021</td>
                        <td>
                            <span class="badge badge-danger">Canceled</span>
                        </td>
                        <td>Edvinas Valentinovicius</td>
                        <td>
                            <a href="">
                                <button class="btn btn-dark btn-rounded">Click</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Inv-2021-1</td>
                        <td>02/02/2021</td>
                        <td>$1020,2</td>
                        <td>20/02/2021</td>
                        <td>
                            <span class="badge badge-warning">Waiting</span>
                        </td>
                        <td>Edvinas Valentinovicius</td>
                        <td>
                            <a href="">
                                <button class="btn btn-dark btn-rounded">Click</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
