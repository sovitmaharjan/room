<div class="topbar">

    <div class="topbar-left">
        <a href="{{ route('dashboard') }}" class="logo">Test<i class="mdi mdi-layers"></i></a>
    </div>

    <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">

            <div class="clearfix">
                <ul class="nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>

                <ul class="nav navbar-right">
                    <li>
                        <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                            <i class="mdi mdi-bell"></i>
                            <span class="badge up badge-success badge-pill">4</span>
                        </a>

                        <ul
                            class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                            <li>
                                <h5>Notifications</h5>
                            </li>
                            <li>
                                <a href="#" class="user-list-item">
                                    <div class="icon bg-info">
                                        <i class="mdi mdi-account"></i>
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">New Signup</span>
                                        <span class="time">5 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="user-list-item">
                                    <div class="icon bg-danger">
                                        <i class="mdi mdi-comment"></i>
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">New Message received</span>
                                        <span class="time">1 day ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="user-list-item">
                                    <div class="icon bg-warning">
                                        <i class="mdi mdi-settings"></i>
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">Settings</span>
                                        <span class="time">1 day ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="all-msgs text-center">
                                <p class="m-0"><a href="#">See all Notification</a></p>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown"
                            aria-expanded="true">
                            <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-img" class="rounded-circle user-img">
                        </a>

                        <ul
                            class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                            <li>
                                <h5>Hi, {{ auth()->user()->name }}</h5>
                            </li>
                            <li>
                                <form id="logout" method="post" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                                <a href="javascript:void(0)" onclick="document.getElementById('logout').submit();" class="dropdown-item"><i class="ti-power-off m-r-5"></i>
                                    Logout</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</div>
