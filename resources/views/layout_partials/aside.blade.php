<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('bower_components/admin-lte/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @auth
                    @isRole('mentee')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-handshake"></i>
                                <p>
                                    Request meeting
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Sessions
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-blog"></i>
                                <p>
                                    Blogs
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/mentee_notifications" class="nav-link">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>
                                    Notifications
                                    <span class="badge badge-primary badge-pill">{{auth()->user()->unreadNotifications()->count()}}</span>
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/mentee-session-chats" class="nav-link">
                                <i class="nav-icon fas fa-comment"></i>
                                <p>
                                    Chat
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                    @endisRole

                    @isRole('mentor')
                        <li class="nav-item">
                            <a href="/check_requests" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Check Requests
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    My Mentees
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-blog"></i>
                                <p>
                                    Blogs
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/read_notifications" class="nav-link">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>
                                    Notifications
                                    <span class="badge badge-primary badge-pill">{{auth()->user()->unreadNotifications()->count()}}</span>
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                    <li class="nav-item">
                        <a href="/mentee-session-chats" class="nav-link">
                            <i class="nav-icon fas fa-comment"></i>
                            <p>
                                Chat
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    @endisRole

                    @isRole('admin')
                        <li class="nav-item">
                            <a href="/reports" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Reports
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Mentors
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-blog"></i>
                                <p>
                                    Blogs
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    Mentees
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                    @endisRole
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
