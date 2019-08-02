@extends('admin/layouts/app')

@section('content')
<div class="jss3">
	<div class="jss4">
		<div class="box dark_gray">
			<div class="columns">
				{{-- First Column --}}
				<div class="column is-2 has-text-centered">
					<img class="rounded_img" src="/storage/admin_images/{{$relatiosss[0]->admin_img}}" alt="Admin Image">
				</div>
				{{-- Second Column --}}
				<div class="column is-10">
					<h5 class="title is-3 has-text-white is-marginless">
						{{$relatiosss[0]->name}}
					</h5>
					<p class="has-text-white m-b-md">
						Member Since{{ \Carbon\Carbon::parse($relatiosss[0]->created_at)->diffForHumans()}}🥶🥵
					</p>

					<a href="/admin/edit_profile/{{$relatiosss[0]->name}}" class="button is-rounded custom_button">
						Edit Profile
					</a>
				</div>

			</div>{{--End Of Columns--}}

			<hr class="m-none" style="background-color: #555e77;">
		</div>

		<div class="box dark_gray">

			<div class="columns">
				<div class="column">
					<h6 class="title is-5 has-text-white has-text-centered">Personal Information</h6>
				</div>
			</div>{{--End Of First Columns--}}

			<div class="m-r-lg m-l-lg">
				<div class="columns">
					<div class="column">
						<p class="subtitle is-5 has-text-white">Email:{{$relatiosss[0]->email}}</p>
					</div>
					<div class="column">
						<p class="subtitle is-5 has-text-white">Address:{{$relatiosss[0]->address}}</p>
					</div>
				</div>{{--End Of First Columns--}}

				<div class="columns">
					<div class="column">
						<p class="subtitle is-5 has-text-white">City:{{$relatiosss[0]->city}}</p>
					</div>
					<div class="column">
						<p class="subtitle is-5 has-text-white">Country:{{$relatiosss[0]->country}}</p>
					</div>
				</div>{{--End Of Second Columns--}}

				<div class="columns">
					<div class="column">
						<p class="title is-5 has-text-centered has-text-white">About Yourself<hr></p>
						<p class="subtitle is-5 has-text-white">{{$relatiosss[0]->body}}</p>
					</div>
				</div>{{--End Of Third Columns--}}
			</div>
		</div>{{--END OF BOX--}}

	</div> {{--jss4 end--}}
</div>{{--jss3 end--}}
@endsection