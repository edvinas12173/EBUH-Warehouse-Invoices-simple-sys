@extends('layouts.main')

@section('content')
    <!-- Title Count Start -->
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="icon"><i class="fas fa-building"></i></div>
                                <p class="text-muted">Companies</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-primary">{{ $companies->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="icon"><i class="fas fa-file-invoice"></i></div>
                                <p class="text-muted">Invoices</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-primary">1390</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="icon"><i class="fas fa-euro-sign"></i></div>
                                <p class="text-muted">Monthly amount due</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-primary">5,723 €</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="icon"><i class="fas fa-users"></i></div>
                                <p class="text-muted">Employees</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-primary">{{ $employees->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Count End -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="table-overflow">
                    <table class="table table-lg">
                        <thead>
                        <tr>
                            <td class="text-dark text-semibold">Invoice ID</td>
                            <td class="text-dark text-semibold">Company name</td>
                            <td class="text-dark text-semibold">Created date</td>
                            <td class="text-dark text-semibold">Amount</td>
                            <td class="text-dark text-semibold">Due date</td>
                            <td class="text-dark text-semibold">Status</td>
                            <td class="text-dark text-semibold"></td>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Inv-2021-1</td>
                                <td>UAB Hanna</td>
                                <td>2021-02-08</td>
                                <td>$1020,2</td>
                                <td>2021-02-28</td>
                                <td>
                                    <span class="badge badge-danger">Canceled</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-link text-dark btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-list"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Inv-2021-1</td>
                                <td>UAB Hanna</td>
                                <td>2021-02-08</td>
                                <td>$1020,2</td>
                                <td>2021-02-28</td>
                                <td>
                                    <span class="badge badge-success">Paid</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-link text-dark btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-list"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Inv-2021-1</td>
                                <td>UAB Hanna</td>
                                <td>2021-02-08</td>
                                <td>$1020,2</td>
                                <td>2021-02-28</td>
                                <td>
                                    <span class="badge badge-warning">Waiting</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-link text-dark btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-list"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Inv-2021-1</td>
                                <td>UAB Hanna</td>
                                <td>2021-02-08</td>
                                <td>$1020,2</td>
                                <td>2021-02-28</td>
                                <td>
                                    <span class="badge badge-danger">Canceled</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-link text-dark btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-list"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">To Do Task List</h4>
                    <div class="card-toolbar">
                        <ul>
                            <li>
                                <a class="text-gray" href="#">
                                    <i class="lni-more-alt"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="list-task list-group">
                    <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox material-checkbox">
                                <input type="checkbox" class="custom-control-input" id="followUp" checked="">
                                <label class="custom-control-label" for="followUp">Follow up clients</label>
                            </div><span class="badge badge-danger">Missed</span>
                        </div>
                    </li>
                    <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox material-checkbox">
                                <input type="checkbox" class="custom-control-input" id="JoinMeeting" checked="">
                                <label class="custom-control-label" for="JoinMeeting">Join business meeting</label>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox material-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brainstorm" checked="">
                                <label class="custom-control-label" for="brainstorm">Discuss about new project</label>
                            </div>
                            <span class="badge badge-warning">Today</span>
                        </div>
                    </li>
                    <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox material-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newFunnel">
                                <label class="custom-control-label" for="newFunnel">Design a new funnel</label>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox material-checkbox">
                                <input type="checkbox" class="custom-control-input" id="makeAnewOrder">
                                <label class="custom-control-label" for="makeAnewOrder">Make a new app</label>
                            </div>
                            <span class="badge badge-success">3 weeks</span>
                        </div>
                    </li>
                    <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox material-checkbox">
                                <input type="checkbox" class="custom-control-input" id="generalThings">
                                <label class="custom-control-label" for="generalThings">Send materials</label>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="follow">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">New companies</h4>
                    </div>
                    @if($companies->count() == 0)
                        <div class="container">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Warning!</strong> The list of companies is empty.
                            </div>
                        </div>
                    @else
                        <ul class="list-media">
                            <?php $count = 0; ?>
                            @foreach($companies as $company)
                                <?php if($count == 4) break; ?>
                                <li class="list-item">
                                    <div class="client-item">
                                        <div class="media-img">
                                            <span class="title text-semibold">{{ $company->name }}</span>
                                        </div>
                                        <div class="info">
                                            <div class="float-item">
                                                <a href="/companies/profile/{{ $company->id }}"><button class="btn btn-common btn-rounded">More informations</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </li><?php $count++; ?>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
