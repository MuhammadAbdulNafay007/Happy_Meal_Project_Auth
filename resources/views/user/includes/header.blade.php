<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand text-primary ms-5" href="#">Happy Meal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
        <a class="nav-link" href="{{route('user.home')}}">Home</a>

        @else
        <a class="nav-link" href="{{route('user.login')}}">Login</a>
        <a class="nav-link" href="{{route('user.register')}}">Registration</a>

        @endauth

      </div>
      @auth
      <div class="dropdown-center me-5">
        <button class="btn btn-primary dropdown-toggle" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
          <span class="navbar-text text-white">
            @auth
            {{auth()->user()->username}}
            @endauth
          </span>
        </button>
        <ul class="dropdown-menu bg-light m-0">
          <li><a href="{{route('user.profile_access')}}" class="dropdown-item">Profile</a></li>
          <li><a href="{{route('user.logout')}}" class="dropdown-item">Logout</a></li>
        </ul>
      </div>
      @endauth
      <!-- <div class="dropdown-center">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Centered dropdown
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Action two</a></li>
          <li><a class="dropdown-item" href="#">Action three</a></li>
        </ul>
      </div> -->
    </div>
  </div>

</nav>