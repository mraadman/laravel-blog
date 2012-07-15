<!-- this is our blade template file
	other views will use this as a "wrapper" -->

<!DOCTYPE HTML>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<title>Nates Blog</title>
	{{ HTML::style('css/style.css') }}
</head>
<body>
	<div class="header">
		@if ( Auth::guest() )
			{{ HTML::link('admin', 'Login') }}
		@else
			Welcome, {{Auth::user()->nickname}}
			{{ HTML::link('logout', 'Logout') }}<br />
			{{ HTML::link('admin', 'Admin') }}
		@endif
		<hr />
		<h1>{{HTML::link('/', 'Nates Blog')}}</h1>
		<h2>Some stuff written by Nate.</h2>
	</div>

	<div class="content">
		@yield('content')
	</div>
</body>
</html>