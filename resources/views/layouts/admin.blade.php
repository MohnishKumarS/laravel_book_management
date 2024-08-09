<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oxford Dashboard</title>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="shortcut icon" href="{{asset('assets/image/book-logo.png')}}" type="image/x-icon">
    {{-- link css lib --}}
    @include('lib.css')

    @stack('styles')
</head>

<body>
    <div class="top-space"></div>
    {{-- Navbar --}}
    @include('navbar')

    {{-- content section --}}
    <main class="page-dashboard my-5">
        <div class="row">
            <div class="col-lg-3 col-xxl-2">
              <div class="left-section d-none d-lg-block">
                <aside>
                    <p class="fw-bold">BOOK MANAGEMENT </p>
                    <a href="{{route('dashboard')}}" class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                        <i class="fa-solid fa-gauge-simple-high"></i>
                        Home
                    </a>
                    <a href="{{url('admin/all-books')}}" class="{{Request::is('admin/all-books') ? 'active' : ''}}">
                        <i class="fa-solid fa-book"></i>
                        All Books
                    </a>
                    <a href="{{route('book.create')}}" class="{{Request::is('create-book') ? 'active' : ''}}">
                        <i class="fa-solid fa-book-open"></i>
                        Create book
                    </a>
                    <a href="{{route('admin.users')}}" class="{{Request::is('admin/users') ? 'active' : ''}}">
                        <i class="fa-solid fa-user"></i>
                        Users
                    </a>
                    <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </aside>
              </div>
            </div>
            <div class="col-lg-8 col-xxl-8">
                <div class="right-section">
                    @yield('content')
                </div>
            </div>
        </div>
       
    </main>

    {{-- footer --}}

    {{-- link js lib --}}
    @include('lib.js')

    @stack('scripts')

    
</body>

</html>
