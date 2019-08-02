@extends('layouts.main_body')

@section('content')
	<section class="sign-area panel p-40" style="background: white !important;">
		<h3 class="sign-title" style="">Sign In <small>Or</small>
			<a href="/register" class="color-green">Sign Up</a></h3>
		<div class="row row-rl-0">
			<div class="col-md-offset-3 col-md-6 col-md-offset-3">

				<form method="POST" action="{{ route('login') }}" class="p-40">
					@csrf

					<div class="form-group">
						<label class="sr-only">Email</label>
						<input type="email"
							  class="form-control input-lg"
							  placeholder="Email"
							  name="email"
							  value="{{ old('email') }}"
							  required>
					</div>

					<div class="form-group">
						<label class="sr-only">Password</label>
						<input type="password" class="form-control input-lg" placeholder="Password"  name="password"
							  required>
					</div>

					<div class="form-group">
						@if (Route::has('password.request'))
							<a href="{{ route('password.request') }}" class="forgot-pass-link color-green">Forget Your Password ?</a>
						@endif
					</div>

					<div class="custom-checkbox mb-20">
						<input type="checkbox"
							  name="remember"
							  id="remember"
							   {{ old('remember') ? 'checked' : '' }}>
						<label class="color-mid" for="remember_account">Remember Me</label>
					</div>
					<button type="submit" class="btn btn-block btn-lg" style="background: linear-gradient(0deg, #88181d, #ff3838 100%);">Login</button>


				<!--        @if (Route::has('password.request'))
					<a class="text-grey text-sm" href="{{ route('password.request') }}">
          Forgot Your Password?
        </a>
      @endif -->
				</form>
			</div>
		</div>
	</section>

@endsection