<section class="header d-flex">
    <div class="container-fluid d-flex align-items-center justify-content-between header-container">
        <div id="menuBar" class="fas fa-bars d-md-none menu-bar"></div>
        <a href="{{ route('index') }}" class="logo"><img class="logo-hp" src="{{ asset('image/hapo_learn.png') }}" alt="HapoLearn Logo">
        </a>
        <nav class="nav" id="nav">
            <a href="{{ route('index') }}" class="{{ '/' == request()->path() ? 'a-active'  : ''}} menu-nav " id="a">home</a>
            <a href="{{ route('courses.index') }}" class="{{ 'courses' == request()->path() ? 'a-active'  : ''}} menu-nav a" id="a">all courses</a>
            @if (Auth::check())
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle menu-nav a-active" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-user">{{ Auth::user()->name }}</i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a href="#" class="menu-nav">profile</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="menu-nav">log out</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="" class="menu-nav" id="login-register" data-toggle="modal"
                   data-target="#loginModal">login/register</a>
            @endif
        </nav>
    </div>
    @include('layouts.login')
</section>
