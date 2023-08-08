<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Royal Apps</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>  
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-header" style="border-bottom:1px solid rgb(161, 161, 161)">
    <div class="container">
        <a class="navbar-brand" href="{{ route('authors.index') }}">Royal Apps</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @if(Auth()->user())
            <li class="nav-item">
            <a class="{{ 'nav-link '.(Route::currentRouteName() == 'authors.index' ? 'active':'' )}}" aria-current="page" href="{{ route('authors.index') }}">Authors</a>
            </li>
            <li class="nav-item">
                <a class="{{ 'nav-link '.(Route::currentRouteName() == 'books.create' ? 'active':'' )}}" aria-current="page" href="{{ route('books.create') }}">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('authors.index') }}"></a>
            </li>
            @endif
        </ul>
        @if(Auth()->user())
        <ul class="navbar-nav ">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Welcome, {{ Auth()->user()->first_name, Auth()->user()->last_name }}
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('profile')}}" class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="{{ route('logout')}}" class="dropdown-item" type="submit">Logout</a></li>
            
          </ul>
        </li>
        </ul>
        @else
            <a href="{{ route('login')}}" class="btn btn-outline-success" type="submit">Login</a>
        @endif
        </div>
    </div>
</nav>
<div class="container d-flex justify-content-center mt-5">
@yield('content')
</div>
@include('Layout.footer')
</body>
<script>
    window.addEventListener('scroll', function() {
      var header = document.querySelector('.sticky-header');
      var scrollPosition = window.pageYOffset;
  
      if (scrollPosition > 0) {
        header.classList.add('sticky-top');
      } else {
        header.classList.remove('sticky-top');
      }
    });
  </script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</html>