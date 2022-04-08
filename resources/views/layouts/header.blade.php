<!-- header section start-->
<section class="header d-flex">
    <div class="container-fluid d-flex align-items-center justify-content-between header-container">
        <div id="menuBar" class="fas fa-bars d-md-none menu-bar"></div>
        <a href="#" class="logo"><img class="logo-hp" src="{{asset('image/hapo_learn.png')}}" alt="HapoLearn Logo">
        </a>
        <nav class="nav" id="nav">
            <a href="#" class="menu-nav">home</a>
            <a href="#" class="menu-nav">all courses</a>
            @if(!Auth::check())
            <a href="" class="menu-nav" id="login-register" data-toggle="modal"
               data-target="#loginModal">login/register</a>
            <a href="#" class="menu-nav">profile</a>
            @else
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle menu-nav" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-user">{{ Auth::user()->name }}</i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a href="#" class="menu-nav">profile</a>
                    <a href="{{ route('logout') }}" class="menu-nav" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket">log out</i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @endif
        </nav>
    </div>
</section>
<!--header section end-->
