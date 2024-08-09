<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="{{url('/')}}">
                <img src="{{asset('assets/image/book-logo.png')}}" height="45"
                    alt="MDB Logo" loading="lazy" />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                </li>
             @auth
             @if (auth()->user()->role == 'admin')
             <li class="nav-item">
                 <a class="nav-link" href="{{route('dashboard')}}">DashBoard</a>
             </li>
             @endif
             @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('book.create')}}">Add Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('mybooks')}}">My Publish</a>
                </li>
                @guest
                <li class="nav-item">
                  <a class="nav-link" href="{{route('register')}}">Register</a>
              </li>
                @endguest
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            {{-- <a class="text-reset me-3" href="#">
                <i class="fas fa-shopping-cart"></i>
            </a> --}}

            <!-- Notifications -->
            {{-- <div class="dropdown">
                <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow" href="#"
                    id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </div> --}}
            <!-- Avatar -->
            @auth
            <div class="dropdown">
              <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                  id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                  <img src="https://img.icons8.com/color/48/circled-user-male-skin-type-3--v1.png"  class="rounded-circle" height="35"
                      alt="Black and White Portrait of a Man" loading="lazy" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                  <li>
                      <a class="dropdown-item" href="{{url('mybooks')}}">My Books</a>
                  </li>
                  {{-- <li>
                      <a class="dropdown-item" href="#">Settings</a>
                  </li> --}}
                  <li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </li>
              </ul>
          </div>
                @else
                <div>
                  <a href="{{ route('login') }}" class="btn-outline-primary btn-rounded">Login</a>
                </div>
            @endauth
        
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
