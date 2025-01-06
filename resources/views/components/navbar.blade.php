
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('homepage')}}">home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          @guest
          <a class="nav-link active" aria-current="page" href="{{route('register')}}">register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">login</a>
        </li>
           @endguest

         
        <form action="/logout" method="POST">
          @csrf
        <li class="nav-item">
          <a class="nav-link" href="{{route('homepage')}}">logout</a>
        </li>
        </form>
         

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="#">Action</a></li> 
            <!-- @auth
            @if (Auth::user()->is_writer) -->
            <!-- @endif 
            @endauth    -->
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li><a class="dropdown-item" href="{{route('writer.dashboard')}}">Dashboard Writer</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>