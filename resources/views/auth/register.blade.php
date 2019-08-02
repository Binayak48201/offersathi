@extends('layouts.main_body')

@section('content')

	<section class="sign-area panel p-40" style="background: white !important;">

		<h3 class="sign-title">Sign Up <small>Or</small>
			<a href="/login" class="color-green">Sign In</a>
		</h3>
		<div class="row row-rl-0">
			<div class="col-md-offset-3 col-md-6 col-md-offset-3">

				<form class="p-40"  method="POST" action="{{ route('register') }}">
					@csrf

					<div class="form-group">
						<label class="sr-only">Full Name</label>
						<input type="text"
							  class="form-control input-lg{{ $errors->has('name') ? ' is-invalid' : '' }}"
							  placeholder="Full Name"
							  name="name"
							  value="{{ old('name') }}"
							  required
							  autofocus>
					</div>

					<div class="form-group">
						<label class="sr-only">Email</label>
						<input type="email"
							  class="form-control input-lg{{ $errors->has('email') ? ' is-invalid' : '' }}"
							  placeholder="Email"
							  name="email"
							  value="{{ old('email') }}"
							  required>
					</div>

					<div class="form-group">
						<label class="sr-only">Password</label>
						<input type="password"
							  class="form-control input-lg{{ $errors->has('password') ? ' is-invalid' : '' }}"
							  placeholder="Password"
							  name="password"
							  required>
					</div>

					<div class="form-group">
						<label class="sr-only">Confirm Password</label>
						<input type="password"
							  class="form-control input-lg"
							  placeholder="Confirm Password"
							  name="password_confirmation"
							  required>
					</div>

					<button type="submit" class="btn btn-block btn-lg" style="background: linear-gradient(0deg, #88181d, #ff3838 100%);">Register</button>

				</form>
			</div>
		</div>
	</section>

@endsection