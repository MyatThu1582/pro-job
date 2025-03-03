<nav class="navbar navbar-expand-lg navbar-light bg-light p-4">
    <div class="container d-flex" style="justify-content: space-around;">
        <div class="">
            <a class="navbar-brand" href="/"><h2>ProJob</h2></a>
        </div>
        <div>
          <ul class="navbar-nav gap-2">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/profile">Profile</a>
            </li>
            @if (Auth::check())
            @if (Auth::user()->role == 'employer')
            <li class="nav-item">
              <a class="nav-link" href="/job/create">New Job</a>
            </li>
            @endif
            @endif
          </ul>
        </div>
        <div>
          <ul class="navbar-nav gap-2">
            @if (Auth::check())
            
            <div class="dropdown">
              <li class="dropdown-toggle"><a href="/profile" style="text-decoration: none; color: black;">{{ Auth::user()->name }}</a></li>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
              </ul>
            </div>

            @else
              <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
            @endif
          </ul>
        </div>    
    </div>    
</nav>