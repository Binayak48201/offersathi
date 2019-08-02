@extends('admin/layouts/app')

@section('content')
<div class="jss3">
	<div class="jss4">
		<div class="columns">
			<div class="column">
				<div class="box dark_gray">
					<h2 class="title has-text-white has-text-centered">Edit Profile</h2><br>

					<form method="POST" action="/admin/edit_adminprofile/{{$admins[0]->admin_id}}" enctype="multipart/form-data">
						@csrf
						{{method_field('PATCH')}}
						<div class="columns">
							<div class="image_media" style="margin: auto;">
								<img id="blah" src="{{asset('placeholder.jpg')}}" alt="your image"
								style="border-radius: 50%;height: 130px;">
								<div class="file">
									<label class="file-label">
										<input class="file-input" type="file" name="admin_img" id="customFile">
										<span class="file-cta">
											<span class="file-icon">
												<i class="fa fa-upload" aria-hidden="true"></i>
											</span>
											<span class="file-label">
												Choose a file…
											</span>
										</span>
									</label>
								</div>
							</div>
						</div>

						<div class="columns">
							<div class="column">
								<p class="has-text-white m-b-none">Address:</p>
								<div class="field">
									<div class="control">
										<input class="input is-success" type="text" name="address" value="{{$admins[0]->address}}" required>
									</div>
								</div>
							</div>
						</div>

						<div class="columns">
							<div class="column">
								<p class="has-text-white m-b-none">City:</p>
								<div class="field">
									<div class="control">
										<input class="input is-success" type="text" name="city" value="{{$admins[0]->city}}" required>
									</div>
								</div>
							</div>

							<div class="column">
								<p class="has-text-white m-b-none">Country:</p>
								<div class="field">
									<div class="control">
										<input class="input is-success" type="text" name="country" value="{{$admins[0]->country}}" required>
									</div>
								</div>
							</div>
						</div>

						<div class="columns">
							<div class="column">
								<p class="has-text-white m-b-none">About Yourself</p>
								<div class="field">
									<div class="control">
										<textarea name="body" class="textarea is-success"rows="3" required>{{$admins[0]->body}}</textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="columns">
							<div class="column is-7 is-offset-5">
								<button type="submit" class="button is-rounded custom_button">Update</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection