  <nav class="navbar navbar-default navbar-fixed-top">

  	<div class="container">
  		<div class="navbar-header">

  			<!-- Collapsed Hamburger -->
  			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
  				<span class="sr-only">Toggle Navigation</span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  			</button>

  			<!-- Branding Image -->
  			<a class="navbar-brand" href="{{ url('/') }}">
  				{{ config('app.name', 'Laravel') }}
  			</a>
  		</div>

  		<div class="collapse navbar-collapse" id="app-navbar-collapse">
  			<!-- Left Side Of Navbar -->
  			<ul class="nav navbar-nav">
  				&nbsp;
  			</ul>

  			<!-- Right Side Of Navbar -->
  			<ul class="nav navbar-nav navbar-right">
  				<!-- Authentication Links -->
  				@if (Auth::guest())
  				<li><a href="{{ route('login') }}">Login</a></li>
  				<li><a href="{{ route('register') }}">Register</a></li>
  				@else
  				<li class="dropdown">
  					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
  						{{ Auth::user()->name }} <span class="caret"></span>
  					</a>

  					<ul class="dropdown-menu" role="menu">
  						<li>
  							<a onclick="event.preventDefault();
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
  </div>
</nav>
<div class="container-fluid">
	<div class="row">
		@if(Auth::check())
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li class="@yield('ActiveHome')"><a href="{{route('home')}}">Dashboard</a></li>
				<li  class="@yield('ActiveProduct')"><a href="#">Products <span class="sr-only">(current)</span></a></li>
				<li class="@yield('ActiveCreateProduct')"><a href="{{ route('product.create') }}">Create Product</a></li>
				<li class="@yield('ActiveViewProduct')"><a href="{{route('product.index') }}">View Product</a></li>
				<li class="@yield('ActiveViewOrder')"><a href="{{route('order.index') }}">View Order</a></li>
			</ul>
			<ul class="nav nav-sidebar">
				<li class="@yield('ActiveCreateCategory')"><a href="{{route('category.create')}}">Add Category</a></li>
				<li class="@yield('ActiveViewCategory')"><a href="{{route('category.index')}}">View Category</a></li>
			</ul>
		</div>
    @endif
	</div>
</div>