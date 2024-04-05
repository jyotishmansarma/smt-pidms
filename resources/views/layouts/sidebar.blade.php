<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{route('dashboard')}}" class="text-nowrap logo-img">
{{--                <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />--}}
                <h3> JJM ASSAM</h3>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('dashboard')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Purchase</span>
                    </li>
                @can('purchase')

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('purchase.create') }}" aria-expanded="false">


                            <span>
                  <i class="ti ti-article"></i>
                </span>
                            <span class="hide-menu">Create PO</span>
                        </a>
                    </li>
                @endcan
                @can('list_purchase')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('purchase.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                            <span class="hide-menu">PO List</span>
                        </a>
                    </li>
                @endcan
    
                   
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">User</span>
                </li>
                @can('user_crete')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('users.create') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                        <span class="hide-menu">Create User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('logout')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                        <span class="hide-menu">User List</span>
                    </a>
                </li>
                @endcan
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('logout')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>