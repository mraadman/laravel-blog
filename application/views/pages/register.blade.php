@layout('templates.main')

@section('content')
	{{ HTML::link('oauth/session/facebook', 'Facebook') }}
	{{ HTML::link('oauth/session/google', 'Google') }}
	{{ HTML::link('oauth/session/github', 'Github') }}
	{{ HTML::link('oauth/session/windowslive', 'WindowsLive') }}

	@if(isset($user))
	     {{ Form::open('register') }}
			<!-- username field -->
			<p>{{ Form::label('username', 'Username') }}</p>
			{{ $errors->first('username', '<p class="error">:message</p>') }}
			<p>{{ Form::text('username', $user['nickname']) }}</p>

			<!-- password field -->
			<p>{{ Form::label('password', 'Password') }}</p>
			{{ $errors->first('password', '<p class="error">:message</p>') }}
			<p>{{ Form::text('password') }}</p>
			<p>{{ Form::text('password_confirmation') }}</p>

			<!-- email field -->
			<p>{{ Form::label('email', 'Email') }}</p>
			{{ $errors->first('email', '<p class="error">:message</p>') }}
			<p>{{ Form::text('email', $user['email']) }}</p>

			<!-- picture field -->
			<p>{{ Form::label('picture', 'Picture') }}</p>
			{{ $errors->first('picture', '<p class="error">:message</p>') }}
			<p>{{ Form::text('picture', $user['image']) }}</p>

			<!-- submit button -->
			<p>{{ Form::submit('Register') }}</p>
		{{ Form::close() }}
	@else
	    {{ Form::open('register') }}
			<!-- username field -->
			<p>{{ Form::label('username', 'Username') }}</p>
			{{ $errors->first('username', '<p class="error">:message</p>') }}
			<p>{{ Form::text('username', Input::old('username')) }}</p>

			<!-- password field -->
			<p>{{ Form::label('password', 'Password') }}</p>
			{{ $errors->first('password', '<p class="error">:message</p>') }}
			<p>{{ Form::text('password') }}</p>
			<p>{{ Form::text('password_confirmation') }}</p>

			<!-- email field -->
			<p>{{ Form::label('email', 'Email') }}</p>
			{{ $errors->first('email', '<p class="error">:message</p>') }}
			<p>{{ Form::text('email', Input::old('email')) }}</p>

			<!-- picture field -->
			<p>{{ Form::label('picture', 'Picture') }}</p>
			{{ $errors->first('picture', '<p class="error">:message</p>') }}
			<p>{{ Form::text('picture', Input::old('picture')) }}</p>

			<!-- submit button -->
			<p>{{ Form::submit('Register') }}</p>
		{{ Form::close() }}
	@endif
@endsection