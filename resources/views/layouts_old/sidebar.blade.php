<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            JJM <b class="font-black">ASSAM</b>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li class="active">
                <a href="{{route('dashboard')}}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label"> Dashboard </span>
                </a>
            </li>
        </ul>
        <p class="menu-label"></p>
        <ul class="menu-list">

            <li>
                <a class="dropdown">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Issue</span>
                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                </a>
                <ul>
                    @can('create_issue')
                        <li>
                            <a href="{{ route('issue.create') }}">
                                <span>Create</span>
                            </a>
                        </li>
                    @endcan
                    <li>
                        <a href="{{ route('issue.index') }}">
                            <span>List</span>
                        </a>
                    </li>
                </ul>
            </li>
            @can('user_crete')
                <li>
                    <a class="dropdown">
                        <span class="icon"><i class="mdi mdi-view-list"></i></span>
                        <span class="menu-item-label">user</span>
                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('users.create') }}">
                                <span>Create</span>
                            </a>
                        </li>
                        <li>
                            <a href="#void">
                                <span>List</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
        </ul>
        <ul class="menu-list">
            <li >
                <a href="{{route('logout')}}">
                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                    <span class="menu-item-label"> Logout </span>
                </a>
            </li>
        </ul>
        <ul class="menu-list">
            {{-- <li>
              <a href="https://justboil.me" onclick="alert('Coming soon'); return false" target="_blank" class="has-icon">
                <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                <span class="menu-item-label">Premium Demo</span>
              </a>
            </li>
            <li>
              <a href="https://justboil.me/tailwind-admin-templates" class="has-icon">
                <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                <span class="menu-item-label">About</span>
              </a>
            </li>
            <li>
              <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                <span class="menu-item-label">GitHub</span>
              </a>
            </li> --}}
        </ul>
    </div>
</aside>
