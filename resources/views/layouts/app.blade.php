<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="/dist/css/selectize.bootstrap3.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>
        <script src="/dist/js/standalone/selectize.js"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>



    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
     @if (Auth::guest() == false)
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'CMS::INN VARIETY') }}
        </a>
    </div>
    <ul class="nav navbar-nav">
     <li class="@if($page_name_active=='home')active @endif">
     <a href="{{ route('home') }}">Home</a></li>

    @if(Auth::user()->role->name=='Admin')

          <li class="dropdown @if($page_name_active=='categories')active @endif">

            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('categories') }}">Main Category</a></li>
              <li><a href="{{ route('subcategories') }}">Sub Category</a></li>
            </ul>
          </li>
    @endif

    @if( (Auth::user()->role->name=='Admin') || (Auth::user()->role->name=='Poster'))
      <li class="dropdown @if($page_name_active=='posts')active @endif">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Post
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('posts') }}">Post</a></li>
          <li><a href="{{ route('trashed') }}">Trash</a></li>
        </ul>
      </li>
    @endif


    
      <li class="dropdown @if($page_name_active=='managehome')active @endif">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mange Home Page
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('site.edit') }}">Mange Home Page</a></li>
          <li><a href="{{ route('site.hilightnews') }}">Hilight บันเทิง</a></li>
        </ul>
      </li>
    


    @if(Auth::user()->role->name=='Admin')
       <li class="dropdown @if($page_name_active=='users')active @endif"><a href="{{ route('users') }}">Users</a></li>
    @endif
    @if( (Auth::user()->role->name=='Admin') || (Auth::user()->role->name=='Marketing'))

      <li class="dropdown @if($page_name_active=='banners')active @endif"><a href="{{ route('banners') }}">Banner</a></li>
    @endif


    </ul>
    @else
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'CMS::INN VARIETY') }}
        </a>
    </div>





    @endif
    <ul class="nav navbar-nav navbar-right">

    @if (Auth::guest())

                            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

                            <li>
                                <a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                            </li>


                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif


    </ul>
  </div>
</nav>



        @yield('content')
    </div>

    <!-- Scripts -->

        @yield('special_js')
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

         @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>
</body>
</html>
