<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('lib')}}/bs4/bootstrap.min.css" />
    <!-- Jquery -->
    <script type="text/javascript" src="{{asset('lib')}}/jquery-3.5.1.min.js"></script>

    <!-- Summernote css links -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- BS4 Js -->
    <script type="text/javascript" src="{{asset('lib')}}/bs4/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    	<div class="container">
		  <a class="navbar-brand" href="{{url('/')}}">WikiCulturE</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="{{url('/')}}">Home</a>
		      </li>
		      <!-- <li class="nav-item">
		        <a class="nav-link" href="{{url('all-categories')}}">Categories</a>
		      </li> -->
		      @guest
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('login')}}">Login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('register')}}">Register</a>
		      </li>
		      @else
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('save-post-form')}}">Add Article</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('manage-posts')}}">Profile</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{url('logout')}}">Logout</a>
		      </li>
		      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            	</form>
		      @endguest
		    </ul>
		  </div>
		</div>
	</nav>
	<!-- Get latest posts -->
	<main class="container mt-4">
		@yield('content')
	</main>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- summernote JS LINKS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({
                height : 500,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

</body>
</html>
