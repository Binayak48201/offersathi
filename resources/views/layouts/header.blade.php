 <!--=========-TOP_BAR============-->
 <nav class="topBar">
 	<div class="container">
 		<ul class="list-inline pull-left">
 			<li><a href="/contact" class="text-primary">Have a question? </a></li>
 		</ul>
 		<ul class="topBarNav pull-right">
 			<li class="dropdown">
 				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">My Account<i class="fa fa-angle-down ml-5"></i></span> </a>
 				<ul class="dropdown-menu w-150" role="menu">
 					@guest
	 					<li>
	 						<a href="{{ route('login') }}">Login</a>
	 					</li>
	 					@if (Route::has('register'))
	 					<li>
	 						<a href="{{ route('register') }}">Create Account</a>
	 					</li>
	 					@endif
 					@else
	 					<li>
	 						<a href="/profiles/{{Auth::user()->name}}">{{ Auth::user()->name }}</a>
	 					</li>
	 					<li>
	 						<a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" 
                                        action="{{ route('logout') }}" 
                                        method="POST" style="display: none;">
                                        @csrf
                            </form>
	 					</li>
 					@endguest
 					<li class="divider"></li>
 					<li><a href="/wishlist">Wishlist</a>
 					</li>
 					<li><a href="/cart">My Cart</a>
 					</li>
        </ul>
    </li>
    <li class="dropdown">
    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-shopping-basket mr-5"></i> <span class="hidden-xs">
    		Cart
{{--    		<sup class="text-primary">--}}
{{--    			@isset($carts[0])--}}
{{--    				<span>({{ $carts[0]->cart_count }})</span>--}}
{{--    			@endisset--}}

{{--    			@empty($carts[0])--}}
{{--    				<span>0</span>--}}
{{--    			@endempty--}}
{{--    		</sup>--}}
    		<i class="fa fa-angle-down ml-5"></i>
    	</span> </a>
    	<ul class="dropdown-menu cart w-250" role="menu">
    		<li>
    			<div class="cart-items">
    				<ol class="items">
{{--    				@if(Auth::check())--}}
{{--        				@foreach($carts as $cart)--}}
{{--        					<li>--}}
{{--								<a href="#">{{ $cart->title }}</a> 						--}}
{{--								{{  $cart->price }}        						--}}
{{--        						</li>--}}
{{--        				@endforeach--}}
{{--    				@else--}}
{{--                    <p>Please,<a href="/login"> Sign in</a></p>--}}
{{--                    @endif--}}
    							</ol>
    						</div>
    					</li>
    					<li>
    						<div class="cart-footer"> <a href="/cart" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>View
    						Cart</a> <a href="#" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a> </div>
    					</li>
    				</ul>
    			</li>
    		</ul>
    	</div>
    </nav><!--=========-TOP_BAR============-->
    
    <!--=========MIDDEL-TOP_BAR============-->
    
    <div>
    	<div class="container">
    		<div class="row display-table" style="display:flex; align-items:center;">
    			<div class="col-sm-3 vertical-align text-left container-fluid" style="margin-bottom:0px;">
    				<!--<h4 style="color: #9a9a0f;-->
    				<!--	font-weight: 600;">OFFER SATHI</h4>-->
    				<img src="{{asset('images/sathi.jpg')}}" alt="Abhibyakthi" class="relative h-16" style="width: 186px;height: 75px;">
    				<a href="javascript:void(0);"></a>
    			</div>
    			<!-- end col -->
    			<div class="col-sm-9" style="padding: 0px">
    				<form method="get" action="/latest_deals">
    					
    						<div class="col-sm-9">
    							<input type="text"  name="s" style="border-radius: 15px" class="form-control" placeholder="Search" value="{{isset($s) ? $s : ''}}" required>
    						</div>
    						<!-- end col -->
    						<!-- end col -->
    						<div class="col-sm-3 hidden-xs" style="margin-bottom: 0px;">
    							<button  type="submit" class="btn-success btn-block btn-lg" value="Search">Search</button>
    						</div>
    						<!-- end col -->
    					<!-- end row -->
    				</form>
    			</div>
    			<!-- end col -->
    		
    		    <div class="col-sm-1">
    		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1" style="border-color:#c7c4c4;margin-top:0px;">
    				<span class="sr-only">Toggle navigation</span>
    				<span class="icon-bar" style="background-color:#8bc34a;"></span>
    				<span class="icon-bar" style="background-color:#8bc34a;"></span>
    				<span class="icon-bar" style="background-color:#8bc34a;"></span>
    			</button>   
    		    </div>  
    		</div>
    		<!-- end  row -->
    	</div>
    </div>
    <div style="border-bottom: 1px solid #d5d8db">
    	<div class="container">
    		<!-- Collect the nav links,  -->
    		<div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">            
    			<ul class="nav navbar-nav">
    				<li><a href="/" class="dropdown-toggle" data-hover="dropdown">Home</a></li>

    				<li class="dropdown megaDropMenu">
    					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Category <i class="fa fa-angle-down ml-5"></i></a>
    					<ul class="dropdown-menu row">
                            @foreach(App\Channel::all() as $chaannel)
                            <div class="col-md-12">
                                <li>
                                    <a href="#">{{ $chaannel->name }}</a>
                                </li>
                            </div>
                            @endforeach
    					</ul>
    				</li>
    				<li><a href="/news" class="dropdown-toggle">News</a></li>
    				<li><a href="/about_us" class="dropdown-toggle" >About Us</a></li>
    				<li><a href="/contact" class="dropdown-toggle">Contact Us</a></li>
    			</ul>
    		</div><!-- /.navbar-collapse -->
    	</div>
    </div>
  
   <div class="scrollmenu">
        @foreach(App\Channel::all() as $channel)
            <a href="/latest_deals/{{ $channel->slug }}" style="color: #000;">{{ $channel->name }}</a>
        @endforeach  
    </div>