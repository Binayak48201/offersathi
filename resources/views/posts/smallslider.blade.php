<section class="section latest-coupons-area ptb-30">
	<header class="panel ptb-15 prl-20 pos-r mb-30">
		<h3 class="section-title font-18">Latest Deals</h3>
		<a class="btn btn-o btn-xs pos-a right-10 pos-tb-center">View All</a>
	</header>

	<div class="latest-coupons-slider owl-slider" data-autoplay-hover-pause="true" data-loop="true" data-autoplay="true" data-smart-speed="1000" data-autoplay-timeout="5000" data-margin="30" data-nav-speed="false" data-items="1" data-xxs-items="1" data-xs-items="2" data-sm-items="2" data-md-items="3" data-lg-items="5">
		@foreach($smallslider as $slider)
			<div class="coupon-item">
				<a href="/deals/{{ $slider->title }}">
				<div class="coupon-single panel t-center">
					<div class="row">
						<div class="col-xs-12">
							<div class="text-center p-20">
								<img class="store-logo" src="/storage/cover_images/{{current(json_decode($slider->adv_img))}}" alt="">
							</div>
							<!-- nd media -->
						</div>
						<!-- end col -->
						<div class="col-xs-12">
							<div class="panel-body pt-0">
								<ul class="deal-meta list-inline">
									<li class="color-muted">
										<h4>{{str_limit($slider->title,15)}}</h4>
									</li>
								</ul>
								<h4 class="color-green t-uppercase">
									{{$slider->offprice}}% OFF
								</h4>
								<h5 class="deal-title">
									<a href="#">{{str_limit($slider->body,40)}}</a>
								</h5>
								<!--<p class="mb-15 color-muted mb-20 font-12">-->
								<!--    <i class="lnr lnr-clock mr-10"></i>-->
							<!--    Expires On {{$slider->count_down}}-->
								<!--</p>-->
							</div>
						</div>
					</div>

				</div>
				</a>

			</div>
		@endforeach

	</div>

</section>

