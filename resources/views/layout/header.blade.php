<nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('dashboard')}}" id="formdashboard" class="nav-link"><i class="nav-icon fas fa-home">&nbsp;Dashboard</i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

            <a href="{{url('katalog')}}" id="formkatalog" class="nav-link"><i class="nav-icon fas fa-file-pdf">&nbsp;Katalog</i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

            <a href="{{url('/event')}}" class="nav-link" id="formevent" ><i class="nav-icon fas fa-calendar-day">&nbsp;Kalender Event</i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/about')}}" class="nav-link" id="formabout"><i  class="nav-icon fas fa-address-card">&nbsp;About</i></a>
        </li>
    </ul>

    <!-- Right navbar links -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <div class="icon">
                <i class="nav-icon fas fa-user"></i>
            </div>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</nav>