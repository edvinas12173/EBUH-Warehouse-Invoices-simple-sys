<!-- Header START -->
<div class="header navbar">
    <div class="header-container">
        <div class="nav-logo">
            <a href="/">
                <b><img src="{{ asset('img/logo.png') }}" alt=""></b>
                <span class="logo">
                    <img src="{{ asset('img/logo-text.png') }}" alt="">
                </span>
            </a>
        </div>
        <ul class="nav-left">
            <li>
                <a class="sidenav-fold-toggler" href="javascript:void(0);">
                    <i class="lni-menu"></i>
                </a>
                <a class="sidenav-expand-toggler" href="javascript:void(0);">
                    <i class="lni-menu"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="search-box">
                <input class="form-control" type="text" placeholder="Type to search...">
                <i class="lni-search"></i>
            </li>
            <li class="massages dropdown dropdown-animated scale-left">
                <span class="counter">3</span>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="lni-envelope"></i>
                </a>
                <ul class="dropdown-menu dropdown-lg">
                    <li>
                        <div class="dropdown-item align-self-center">
                            <h5><span class="badge badge-primary badge-pro float-right">745</span>Messages</h5>
                        </div>
                    </li>
                    <li>
                        <ul class="list-media">
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <img src="{{ asset('img/users/avatar-1.jpg') }}" alt="">
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            Amanda Robertson
                                        </span>
                                        <span class="sub-title">Dummy text of the printing and typesetting industry.</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <img src="{{ asset('img/users/avatar-2.jpg') }}" alt="">
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            Donovan
                                        </span>
                                        <span class="sub-title">It is a long established fact that a reader will</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <img src="{{ asset('img/users/avatar-3.jpg') }}" alt="">
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            Frank Handrics
                                        </span>
                                        <span class="sub-title">You have 87 unread messages</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="check-all text-center">
                        <span>
                            <a href="#" class="text-gray">View All</a>
                        </span>
                    </li>
                </ul>
            </li>
            <li class="notifications dropdown dropdown-animated scale-left">
                <span class="counter">2</span>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="lni-alarm"></i>
                </a>
                <ul class="dropdown-menu dropdown-lg">
                    <li>
                        <h5 class="n-title text-center">
                            <i class="lni-alarm"></i>
                            <span>Notifications</span>
                        </h5>
                    </li>
                    <li>
                        <ul class="list-media">
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-primary">
                                            <i class="lni-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            5 new messages
                                        </span>
                                        <span class="sub-title">4 min ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-success">
                                            <i class="lni-comments-alt"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            4 new comments
                                        </span>
                                        <span class="sub-title">12 min ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-info">
                                            <i class="lni-users"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            3 Friend Requests
                                        </span>
                                        <span class="sub-title">a day ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-purple">
                                            <i class="lni-comments-alt"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">
                                            2 new messages
                                        </span>
                                        <span class="sub-title">12 min ago</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="check-all text-center">
                        <span>
                            <a href="#" class="text-gray">Check all notifications</a>
                        </span>
                    </li>
                </ul>
            </li>
            <li class="user-profile dropdown dropdown-animated scale-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="profile-img img-fluid" src="{{ Auth::user()->image }}" alt="">
                </a>
                <ul class="dropdown-menu dropdown-md">
                    <li>
                        <ul class="list-media">
                            <li class="list-item avatar-info">
                                <div class="media-img">
                                    <img src="{{ Auth::user()->image }}" alt="">
                                </div>
                                <div class="info">
                                    <span class="title text-semibold">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                                    @if (Auth::user()->role == "Admin")
                                        <span class="sub-title text-primary">{{ Auth::user()->role }}</span>
                                    @elseif (Auth::user()->role == "Accountant")
                                        <span class="sub-title text-success">{{ Auth::user()->role }}</span>
                                    @else
                                        <span class="sub-title text-dark">{{ Auth::user()->role }}</span>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="/employees/profile/{{ Auth::user()->id }}">
                            <i class="lni-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="lni-lock"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Header END -->

<!-- Side Nav START -->
<div class="side-nav expand-lg">
    <div class="side-nav-inner">
        <ul class="side-nav-menu">
            <li class="side-nav-header">
                <span>Navigation</span>
            </li>
            <li class="nav-item {{ Request::is('/') ? 'dropdown open' : '' }}">
                <a href="/">
                    <span class="icon-holder">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('employees') ? 'dropdown open' : '' }}">
                <a href="/employees">
                    <span class="icon-holder">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="title">Employees</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('companies') ? 'dropdown open' : '' }}">
                <a href="/companies">
                    <span class="icon-holder">
                        <i class="fas fa-building"></i>
                    </span>
                    <span class="title">Companies</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('warehouse') ? 'dropdown open' : '' }}">
                <a href="/warehouse">
                    <span class="icon-holder">
                        <i class="fas fa-warehouse"></i>
                    </span>
                    <span class="title">Warehouse</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('invoices') ? 'dropdown open' : '' }}">
                <a href="/invoices">
                    <span class="icon-holder">
                        <i class="fas fa-file-invoice"></i>
                    </span>
                    <span class="title">Invoices</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END -->
