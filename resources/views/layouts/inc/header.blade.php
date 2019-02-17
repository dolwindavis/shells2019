<nav class="navbar navbar-expand-lg fixed-top navbar-light ">
    <div><a class="ml-2" href="#" class=""><img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/home/logo.png
" width="100%" height="100%"></a></div>
    <div class="container">
    <button class="navbar-toggler mr-5" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon"></span>
    <span class="navbar-toggler-icon"></span>
    <span class="navbar-toggler-icon"></span>
    </button>
    <h3 class="border-l ml-2 p-2 text-dark" style="letter-spacing: 2px;"><b>SHELLS 2K19</b></h3>
  </div>
    <div class="collapse navbar-collapse float-right" id="navbarNav">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/events') }}">Events</a>
        </li>

<!-- Authenticated user Drop Down Menu -->

        @if(Auth::User())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{{Auth::User()->username}}} 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ url('student') }}">Registration</a>
           <!-- <a class="dropdown-item" href="{{ url('events/register') }}">Event Registration</a> -->
            <a class="dropdown-item" href="{{ url('logout') }}" >Logout</a>
          </div>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/register') }}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="{{ url('login') }}"><i class="fas fa-sign-in-alt" style="font-size: 20px;"></i></a>
        </li>
        @endif

<!-- end of  the authenticated DropDown -->

      </ul>
    </div>
  </nav>