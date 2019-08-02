@extends('layouts.main_body')



@section('content') 



<main id="mainContent" class="main-content">

	<div class="page-container ptb-10">

		<div class="container">

			<section class="section deals-area ptb-30">



				<!-- Page Control -->

				<header class="page-control panel ptb-15 prl-20 pos-r mb-30">



					<!-- List Control View -->

					<ul class="list-control-view list-inline">

						<li>

							<a href="/latest_deals">
								<i class="fa fa-bars hide"></i>
							</a>

						</li>

					</ul>

					<div class="pos-tb-center">

						<ul class="list-control-view list-inline">

							<li>

								<h5>Sort By:</h5>

							</li>

							<li>

								<h6>

									<a href="/latest_deals">Latest Deals</a>

								</h6>

							</li>

							<li>

								<h6>

									<a href="/latest_deals?filter=popular&sort=asc">Price:low to high</a>

								</h6>

							</li>

							<li>

								<h6>

									<a href="/latest_deals?filter=popular&sort=desc">Price:high to low</a>

								</h6>

							</li>

							<li>

								<h6>

									<a href="/latest_deals?filter=view&sort=desc">Most Viewed</a>

								</h6>

							</li>

						</ul>

					</div>

				</header>

				<!-- End Page Control -->

				<div class="row row-masnory row-tb-20">

					@forelse($advertisments as $adv)

					    <a href="/deals/{{$adv->title }}">

    <div class="col-sm-6 col-lg-4 og">

      <div class="deal-single panel">

        <div class="parent">

          <div class="child">

            <figure class="deal-thumbnail embed-responsive embed-responsive-16by9" 

            data-bg-img="/storage/cover_images/{{current(json_decode($adv->adv_img))}}">

            <div class="time-left bottom-15 right-20 font-md-14">

              <span>

                @if($adv->count_down != NULL)

                <span>

                  <i class="ico fa fa-clock-o mr-10"></i>

                  <span class="t-uppercase" data-countdown="{{$adv->count_down}}"></span>

                </span>

                @endif

              </span>

            </div>

          </figure>

        </div>

      </div>

      <div class="bg-white pt-20 pl-20 pr-15">

        <div class="pr-md-10">

          <div class="rating mb-10">

            <span class="rating-stars rate-allow" data-rating="5">

              <i class="fa fa-star-o star-active"></i>

              <i class="fa fa-star-o"></i>

              <i class="fa fa-star-o"></i>

              <i class="fa fa-star-o"></i>

              <i class="fa fa-star-o"></i>

            </span>

            <span class="rating-reviews">

              ( <span class="rating-count">241</span> rates )

            </span>

          </div>

          <h4 class="deal-title mb-10">

            

              {{ $adv->title }}

            

          </h4>

          <!--<ul class="deal-meta list-inline mb-10 color-mid">-->

          <!--  <li><i class="ico fa fa-map-marker mr-10"></i>{{ $adv->place }}</li>-->

          <!--  <li><svg xmlns="http://www.w3.org/2000/svg" width="19" height="13" viewBox="0 0 19 13">-->
          <!--          <g fill="none" fill-rule="evenodd">-->
          <!--              <path d="M0-3h19v19H0z"></path> -->
          <!--              <path fill="#78909C" d="M9.5.562C5.542.562 2.161 3.025.792 6.5c1.37 3.475 4.75 5.937 8.708 5.937s7.339-2.462 8.708-5.937C16.838 3.025 13.458.562 9.5.562zm0 9.896A3.96 3.96 0 0 1 5.542 6.5 3.96 3.96 0 0 1 9.5 2.542 3.96 3.96 0 0 1 13.458 6.5 3.96 3.96 0 0 1 9.5 10.458zm0-6.333A2.372 2.372 0 0 0 7.125 6.5 2.372 2.372 0 0 0 9.5 8.875 2.372 2.372 0 0 0 11.875 6.5 2.372 2.372 0 0 0 9.5 4.125z" opacity=".5"></path>-->
          <!--          </g>-->
          <!--      </svg>-->
          <!--  {{ $adv->visits }}-->
          <!--  </li>-->

          <!--</ul>-->

          <!--<p class="text-muted mb-20">{{ str_limit($adv->body,90) }}</p>-->

        </div>

        <div class="deal-price pos-r mb-15">

          <h3 class="price ptb-5 text-right">

              <span class="price-sale">

                    @if($adv->str_price != NULL)

                        Rs.{{ $adv->str_price }}

                    @endif   

              </span> 

                @if($adv->price != NULL)

                    Rs.{{ $adv->price }}

               @endif</h3>
               
               
               @if($adv->discount != NULL)

                    <div class="text-right">
                        <strong style="color:#43e643;">
        
                            {{ $adv->discount }}% off       
                        </strong>    
        
                    </div>

                @endif

      </div>

    </div>

  </div>

</div>

</a>  

			@empty

			<h4 class="text-center">There are no revelent results at this time.</h4>

			@endforelse



		</div>





	</section>



</div>

</div>





</main>



@endsection

