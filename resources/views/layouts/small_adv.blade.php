<div class="row">
  <div class="col-md-4" style="padding-bottom:15px;">
    <div class="card mb-4 shadow-sm" style="background: #fff;">
      <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{asset('images/50524891_402951257117816_2476420525887324160_n.jpg')}}" data-holder-rendered="true">
      <div class="card-body" style="
      flex: 1 1 auto;
      padding: 1.25rem;
      text-align: justify;    height: 141px;">
      <h5 class="mb-10 pt-5">Save Money</h5>
      <p class="card-text">हरेक Sunday Shopping गद्द्दा **NIBL Visa Domestic Card बाट Payment गरि पाउनुहाेस् <span style="color: red;">*15% Cash Bank.</span></p>
    </div>
  </div>
</div>
<div class="col-md-4" style="padding-bottom:15px;">
  <div class="card mb-4 shadow-sm" style="background: #fff;">
    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="{{asset('images/wow-wednesday.png')}}" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
    <div class="card-body" style="
    flex: 1 1 auto;
    padding: 1.25rem;
    text-align: justify;    height: 141px;
    ">
    <h5 class="mb-10 pt-5">Find Best Offers</h5>
    <p class="card-text">हरेक Wednesday Bhat-Bhateni मा Shopping गद्द्दा **NIBL Visa Domestic Card बाट Payment गरि पाउनुहाेस् <span style="color: red;">Upto NPR750* Gift Voucher.</p>
    </div>
  </div>
</div>
<div class="col-md-4" style="padding-bottom:15px;">
  <div class="card mb-4 shadow-sm" style="background: #fff;">
    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="{{asset('images/time.jpg')}}" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
    <div class="card-body" style="
    flex: 1 1 auto;
    padding: 1.25rem;
    text-align: justify;    height: 141px;
    ">
    <h5 class="mb-10 pt-5">Wow Time</h5>
    <p class="card-text">Nepal Telecom brings its first Linear TV OTT appservice, WOWTIME to its users WOWTIME.</p>
  </div>
</div>
</div>

</div>
@isset($posts)
	<div class="row">
		@foreach($posts as $post)
			<a href="/deals/{{ $post->title }}">
				<div class="col-md-4" style="padding-bottom:15px;">
					<div class="card mb-4 shadow-sm" style="background: #fff;">
						<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{asset('images/50524891_402951257117816_2476420525887324160_n.jpg')}}" data-holder-rendered="true">
						<div class="card-body" style="
				 flex: 1 1 auto;
				 padding: 1.25rem;
				 text-align: justify;    height: 141px;">
							<h5 class="mb-10 pt-5">{{ $post->title }}</h5>
							<p class="card-text">{{ str_limit($post->body,180) }}</p>
						</div>
					</div>
				</div>
			</a>
		@endforeach
	</div>
@endisset