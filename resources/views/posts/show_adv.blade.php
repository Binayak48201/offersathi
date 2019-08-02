@extends('layouts.main_body')
@section('content') 
        <div class="page-container ptb-40">
            <div class="container">
			  <div class="mb-10">
				 <h1 class="product-header">{{ $advertisment->title }}</h1>
			  </div>
                <div class="row row-rl-10 row-tb-20">
                    <div class="page-content col-xs-12 col-sm-7 col-md-8">
                        <div class="row row-tb-20" style="border-right: 1px solid #e6e7e8;">
                            <div class="col-xs-12">
                                <div class="deal-deatails panel" style="background: white !important;">
                                    <div class="deal-slider">
                                        <div id="product_slider" class="flexslider">
                                            <ul class="slides">

                                                @foreach(json_decode($advertisment->adv_img) as $image)
                                                    <li>
                                                        <img src="/storage/cover_images/{{ $image }}" alt="{{$advertisment->title }}">
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                        <div id="product_slider_nav" class="flexslider flexslider-nav">
                                            <ul class="slides">
                                                @foreach(json_decode($advertisment->adv_img) as $image)
                                                    <li>
                                                        <img src="/storage/cover_images/{{$image}}" alt="{{$advertisment->title }}">
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    {{--                                         <img  class="img-responsive" style="width:100%;" src="/storage/cover_images/{{ $advertisment->adv_img }}"> --}}
                                    @if($advertisment->description != NULL)
								  <div class="deal-body p-20">
									 {!! $advertisment->description  !!}
								 </div>
							  @endif
                                </div>
                            </div>
                            


                            </div>
                        </div>
                        <div class="page-sidebar col-md-4 col-sm-5 col-xs-12">
                            <!-- Blog Sidebar -->
                            <aside class="sidebar blog-sidebar">
                                <div class="row row-tb-10">
                                    <div class="col-xs-12">
                                        <div class="widget single-deal-widget panel prl-20" style="background: white !important;">
                                            <div class="widget-body text-center">
{{--                                                <h2 class="mb-20 h3">--}}
{{--                                                    {{ $advertisment->title }}--}}
{{--                                                </h2>--}}
                                                <ul class="deal-meta list-inline mb-10 color-mid">
                                                    <li><i class="ico fa fa-map-marker mr-10"></i>{{ $advertisment->place }}</li>
                                                    <li><i class="ico fa fa-eye mr-10"></i>{{ $advertisment->visits }}</li>
                                                </ul>
                                                <h5 class="text-lg">
                                                    {{ $advertisment->body }}
                                                </h5>
                                                <div>
                                                <div class="price mb-20">
                                                    <h2 class="price" style="color: rgb(52, 135, 0);">
                                                        <span class="price-sale" style="color: rgb(97, 97, 97);">
                                                            Rs.{{ $advertisment->str_price }}
                                                        </span> 
                                                    Rs.{{ $advertisment->price }}
                                                    </h2>
                                                </div>
                                                <!--<div class="buy-now mb-20">-->
                                                <!--    <a href="#" target="_blank" class="btn btn-block btn-lg">-->
                                                <!--        <i class="fa fa-shopping-cart font-16 mr-10"></i> Buy now-->
                                                <!--    </a>-->
                                                <!--</div>-->
                                                <div class="buy-now mb-40">
                                                    @if(Auth::Check())
                                                  <form method="POST" action="/add-cart">
                                                         @csrf
                                                         <input type="hidden" name="adv" value="{{ $advertisment->id }}">
                                                         <button style="width: 100%;" class="btn-success btn-block btn-lg">
                                                            <span class="icon lnr lnr-cart"></span>
                                                            Add To Cart
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                            <div class="time-left mb-30">
                                                <a href="tel:{{ $advertisment->contact }}" type="button"
										 class="target button btn-block btn-lg" style="">
                                                    <span>☎️</span>
                                                    {{ $advertisment->contact }}
                                                </a>
                                           </div>
								   <div class="sharing">
									   <span class="sharing-text mb-10">Share This Deal</span>
									   <ul class="list-inline social-icons social-icons--colored t-center">
										    <li class="social-icons__item">
											   <a href="https://www.facebook.com/sharer/sharer.php?u=https://offerexpressnepal.com/deals/{{ $advertisment->title }}" target="_blank">
												  <i class="fa fa-facebook"></i>
											   </a>
										    </li>
										    <li class="social-icons__item">
											   <a href="https://twitter.com/share?u=https://offerexpressnepal.com/deals/{{ $advertisment->title }}" class="twitter-share-button" data-show-count="false"><i class="fa fa-twitter"></i></a>
										    </li>
										    <li class="social-icons__item">
											   <a href="#"><i class="fa fa-pinterest"></i></a>
										    </li>
										    <li class="social-icons__item">
											   <a href="#"><i class="fa fa-linkedin"></i></a>
										    </li>
										    <li class="social-icons__item">
											   <a href="#"><i class="fa fa-google-plus"></i></a>
										    </li>
									   </ul>
								   </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>

			  <section class="section latest-coupons-area ptb-30">
				  <header class="panel ptb-15 pos-r mb-10">
					  <h2 class="section-title font-18 text-dark">Customers Also Bought</h2>
				  </header>
				  <div class="latest-coupons-slider owl-slider" data-autoplay-hover-pause="true" data-loop="true"
					  data-autoplay="true" data-smart-speed="1000" data-autoplay-timeout="5000" data-margin="30" data-nav-speed="false" data-items="1" data-xxs-items="1" data-xs-items="2" data-sm-items="2" data-md-items="3" data-lg-items="4">
					  @foreach($advertisments as $slider)
						  <div class="coupon-item">
							  <a href="/deals/{{ $slider->title }}">
								  <div class="coupon-single panel">
									  <div class="row">
										  <div class="col-xs-12">
											  <div class="text-center">
												  <img style="width: 100%;height: 155px;"
													  src="/storage/cover_images/{{current(json_decode($slider->adv_img))}}" alt="">
											  </div>
											  <!-- nd media -->
										  </div>
										  <!-- end col -->
										  <div class="col-xs-12 mt-10">
											  <div class="pt-0">
												  <ul class="deal-meta list-inline">
													  <li class="color-muted">
														  <h4 class="slider-item">{{str_limit
														  ($slider->title,15)}}</h4>
													  </li>
												  </ul>
												  <h3>
													  <span class="price-sale" style="color: rgb(97, 97,97);">
                                                    				Rs.33
													  </span>
													  <span style="color: rgb(52, 135, 0);">
														  Rs.32.01
													  </span>
												  </h3>
											  </div>
										  </div>
									  </div>

								  </div>
							  </a>

						  </div>
					  @endforeach

				  </div>

			  </section>
			  <!--Reply VIEW-->
			  <div class="col-xs-12">
				  <div class="posted-review panel" style="background: white !important;">
					  <h3 class="h-title">Customer Reviews</h3>
{{--					  <h3 class="h-title">{{ $advertisment->replies()->count() }} Comments</h3>--}}
					  @foreach($replies as $reply)
						  @include('posts.replies')
					  @endforeach
				  </div>
			  </div>

			@if(Auth::check())
			<!--END OF Reply VIEW-->
			  <div class="col-xs-12">
				  <div class="post-review panel p-20" style="background: white !important;">
					  <form class="horizontal-form pt-30"
						   action="{{ $advertisment->path() . '/replies'}}" method="POST">
						  @csrf
						  <div class="row row-v-10">
							  <div class="col-xs-12">
								  <textarea name="body" class="form-control" placeholder="Your Review" rows="6" required></textarea>
							  </div>
							  <div class="col-xs-12 text-right">
								  <button type="submit" class="btn mt-20" style="color: #fff;background-color: #5cb85c;border-color: #4cae4c;">Submit review</button>
							  </div>
						  </div>
					  </form>
				  </div>
			  </div>
			@else
			  <div class="col-xs-12">
				  <div class="post-review panel p-20 text-center" style="background: white !important;">
					  <p>Please, <a href="/login" class="btn btn-link" style="color: #e00000;background: transparent;">
							  Sign in</a> to participate in the review.</p>
				  </div>
			  </div>
			@endif

		  </div>
    </div>
@endsection