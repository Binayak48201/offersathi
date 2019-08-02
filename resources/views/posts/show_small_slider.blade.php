@extends('layouts.main_body')
@section('content')
	<div class="page-container ptb-60" style="background-color: #e9ebee !important;">
		<div class="container">
			<div class="row row-rl-10 row-tb-20">
				<div class="page-content col-xs-12 col-sm-7 col-md-8">
					<div class="row row-tb-20">
						<div class="col-xs-12">
							<div class="deal-deatails panel" style="background: white !important;">
								<div class="deal-slider">
									<div id="product_slider" class="flexslider">
										<ul class="slides">

											@foreach(json_decode($advertisment->adv_img) as $image)
												<li>
													<img src="/storage/smallslider_images/{{ $image }}" alt="{{$advertisment->title }}">
												</li>
											@endforeach

										</ul>
									</div>
									<div id="product_slider_nav" class="flexslider flexslider-nav">
										<ul class="slides">
											@foreach(json_decode($advertisment->adv_img) as $image)
												<li>
													<img src="/storage/smallslider_images/{{$image}}" alt="{{$advertisment->title }}">
												</li>
											@endforeach
										</ul>
									</div>
								</div>
								{{--                                         <img  class="img-responsive" style="width:100%;" src="/storage/cover_images/{{ $advertisment->adv_img }}"> --}}
								<div class="deal-body p-20">
									<h3 class="mb-10">{{ $advertisment->title }}</h3>
									<div class="rating mb-10">
                                            <span class="rating-stars" data-rating="3">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
									</div>
									<h2 class="price mb-15">{{ $advertisment->place }}</h2>
									<p class="mb-15">{{ $advertisment->body }}</p>
								</div>
							</div>
						</div>


						<!--Reply VIEW-->
						<div class="col-xs-12">
							<div class="posted-review panel p-30" style="background: white !important;">
								<h3 class="h-title">{{ $advertisment->replies()->count() }} Comments</h3>
								@foreach($replies as $reply)

									<hotreplies :attributes="{{ $reply }}" inline-template>
										<div class="review-single pt-30">
											<div class="media">
												<div class="media-left">
													@if(Auth::check())
														<img class="media-object mr-10"
															src="#"
															style="border-radius: 25px;">
													@endif
												</div>

												<div class="media-body">
													<div class="review-wrapper clearfix">
														<div class="flex justify-between mb-2">
															<div>
																<h4 class="" style="color: #000">
																	{{ $reply->owner->name }}
																</h4>
															</div>

															<div>
																{{ $reply->created_at->diffForHumans() }}
															</div>

														</div>

														<div v-if="editing">
															<textarea class="w-full" rows="3" v-model="body"></textarea>
															<button @click="update" class="btn btn-xs" style="background-color: #ff6666;">
																Update
															</button>
															<button class="btn-link btn-info" @click="editing=false">Cancel</button>
														</div>

														<p v-else class="copy" v-text="body"></p>
														@can('update', $reply)
															<button type="button" class="btn-link" @click="editing = true">Edit</button>
															<button type="button" class="btn-link" @click="destroy">Delete</button>
														@endcan
													</div>
												</div>
											</div>
										</div>

									</hotreplies>

								@endforeach
							</div>
						</div>

					@if(Auth::check())
						<!--END OF Reply VIEW-->
							<div class="col-xs-12">
								<div class="post-review panel p-20" style="background: white !important;">
									<h3 class="h-title">Post Review</h3>
									<form class="horizontal-form pt-30"
										 action="/hotest_deals/{{ $advertisment->title }}/replies"
										 method="POST">
										@csrf
										<div class="row row-v-10">
											<div class="col-xs-12">
												<textarea name="body" class="form-control" placeholder="Your Review" rows="6" required></textarea>
											</div>
											<div class="col-xs-12 text-right">
												<button type="submit" class="btn mt-20">Submit review</button>
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
				<div class="page-sidebar col-md-4 col-sm-5 col-xs-12">
					<!-- Blog Sidebar -->
					<aside class="sidebar blog-sidebar">
						<div class="row row-tb-10">
							<div class="col-xs-12">
								<div class="widget single-deal-widget panel ptb-30 prl-20" style="background: white !important;">
									<div class="widget-body text-center">
										<h2 class="mb-20 h3">
											{{ $advertisment->title }}
										</h2>
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
												<a href="tel:{{ $advertisment->contact }}" type="button" class="target button" style="">
													<span>☎️</span>
													{{ $advertisment->contact }}
												</a>
												{{-- <div class="color-mid font-14 font-lg-16">
												   <i class="ico fa fa-clock-o mr-10"></i>
												   <span data-countdown="2020/10/10 12:25:10"></span>
											    </div> --}}
											</div>
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
					</aside>
				</div>
			</div>
		</div>
	</div>
@endsection