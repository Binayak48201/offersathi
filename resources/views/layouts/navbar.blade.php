<!-- Header Menu -->

<div class="header-menu purple">

    <div class="container"> 

        <nav class="nav-bar">

            <div class="nav-header">

                <span class="nav-toggle" data-toggle="#header-navbar">

                    <i></i>

                    <i></i>

                    <i></i>

                </span>

            </div>

            <div id="header-navbar" class="nav-collapse">

                <ul class="nav-menu">



                    <li class="{{ Request::is('/') ? 'active' : '' }}">

                        <a href="/">Home</a>

                    </li>



                    <li class="dropdown-mega-menu">

                        <a href="deals_grid.html">Category<span class="indicator"><i class="fa fa-angle-down"></i></span></a>

                        <div class="mega-menu" style="display: none;">

                            <div class="row row-v-10">

                                <div class="col-md-12">

                                    <ul>

                                        @foreach(App\Channel::all() as $chaannel)

                                        <div class="col-md-4">

                                            <li>

                                                <a href="/{{$chaannel->slug}}">{{ $chaannel->name }}</a>

                                            </li>

                                        </div>

                                        @endforeach

                                    </ul>

                                </div>



                            </div>

                        </div>

                    </li>

                    <li>

                        <a href="coupons_grid.html">Brands</a>

                        <ul style="display: none;">

                            @foreach (App\Brand::all() as $brand)

                                <li>

                                    <a href="/show_brand/{{ $brand->id }}">{{ $brand->brand_name }}</a>

                                </li>

                            @endforeach    

                        </ul>

                    </li>

                    <li class="{{ Request::is('news') ? 'active' : '' }}">

                        <a href="/news">News</a>

                    </li>

                    <li class="{{ Request::is('about_us') ? 'active' : '' }}">

                        <a href="/about_us">About Us</a>

                    </li>

                    <li class="{{ Request::is('contact') ? 'active' : '' }}">

                        <a href="/contact">Contact Us</a>

                    </li>

                </ul>

            </div>

        </nav>

    </div>

</div>

<!-- End Header Menu -->