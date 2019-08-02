<div class="container">
  <div class="section deals-header-area ptb-30">
    <div class="row row-tb-20">
        <div class="col-xs-12 col-md-4 col-lg-3 hidden-xs">
            <aside>
                <ul class="nav-coupon-category panel" style="max-height: 475px;overflow-y: auto;">
                    @foreach(App\Channel::all() as $channel)
                        <li class="items-after">
                            <a class="items-afters" href="/latest_deals/{{ $channel->slug }}">
                                <i class="fa fa-angle-double-right" style="color: #e01616"></i>
                                {{ $channel->name }}
                            </a>
                        </li>
                    @endforeach  
                </ul>
            </aside>
        </div>
        <div class="col-xs-12 col-md-8 col-lg-9">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                @foreach( $slides as $slide )
                <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}">
                </li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner image-content">
                @foreach( $slides as $slide )
                    <div class="item {{ $loop->first ? ' active' : '' }}" >
                        <img src="/storage/slider_images/{{$slide->slider_img}}" class="bg-image">
                    </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>