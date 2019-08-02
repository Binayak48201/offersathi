<section class="section latest-deals-area">
  <header class="panel ptb-10 pos-r mb-5">
    <h2 class="section-title font-18 text-dark">
      Popular on OfferExpress 
    </h2>
    {{-- <a href="/latest_deals" class="btn btn-o btn-xs pos-a right-10 pos-tb-center">View All</a> --}}
  </header>
  <div class="row row-masnory row-tb-20">
    @foreach($advs as $adv)
    <div class="col-sm-6 col-lg-3 ">
      <a href="/deals/{{$adv->title }}">
        <div class="medias" style="border-bottom: 1px solid #a9a4a4;">
        <div class="deal-single panel">
          <div class="parent">
            <div class="child">
              <figure class="deal-thumbnail embed-responsive embed-responsive-16by9" 
              data-bg-img="/storage/cover_images/{{current(json_decode($adv->adv_img))}}">
                </figure>
              </div>
            </div>
            <div class="bg-white">
              <div class="pr-md-10">
                <h4 class="deal-title text-dark">
                  {{ $adv->title }}
                </h4>
                      {{-- <p class="text-muted mb-20">{{ str_limit($adv->body,90) }}</p> --}}
                    </div>
                    <div class="deal-price pos-r">
                      <h3 class="price ptb-5 flex justify-between">
                        <p class="place_label">{{ $adv->place}}</p>
                        <div class="">
                        <span class="price-sale" style="color: #616161;">
                          @if($adv->str_price != NULL)
                          Rs.{{ $adv->str_price }}
                          @endif   
                        </span> 
                        @if($adv->price != NULL)
                          <span style="color:#348700;">Rs.{{ $adv->price }}</span>
                        @endif
                        </div>
                    </h3>
                      @if($adv->discount != NULL)
                      <div class="text-right">
                        <span id="label-off">
                          {{ $adv->discount }}% off       
                        </span>  
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              </a>  
            </div>
            @endforeach
          </div>
          @if($advs->hasMorePages())
          <header class="panel prl-20 pos-r">
            <div class="float-right" >{{ $advs->links() }}</div>
          </header>
          @endif
        </section>