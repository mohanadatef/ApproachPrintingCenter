<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img  src="{{ asset('public/image/info/approach logo-01.png') }}" alt="logo" style="width: 50%;height: 50%" /></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img  src="{{ asset('public/image/info/approach logo-01.png') }}" alt="logo" style="width: 10%;height:10%" /><b>pproach</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                       <a href="{{ url('/admin/user/edit/'.Auth::user()->id)}}">{{Auth::user()->name}}</a>
                </li>
                <li class="dropdown user user-menu">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
@yield('main-header')