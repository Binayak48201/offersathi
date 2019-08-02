@isset($posts)
    <div class="row">
        @foreach($posts as $post)
            <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{ $post->id}}">
            <div class="col-md-4" style="padding-bottom:15px;">
              <div class="card mb-4 shadow-sm" style="background: #fff;">
                <img class="card-img-top"  style="height: 225px; width: 100%; display: block;" src="/storage/cover_images/{{current(json_decode($post->adv_img))}}" data-holder-rendered="true">
                    <div class="card-body offerexrpress-card">
                        <h4 class="deal-title text-dark">
                            {{ $post->title }}
                        </h4>
                        <h5 class="text-lg">{{ str_limit($post->body,100) }}</h5>
                    </div>
                </div>
            </div>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter{{ $post->id}}" tabindex="-1" role="dialog" 
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            
                            <div class="row">
                                <div class="col-lg-5">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                @foreach(json_decode($post->adv_img) as $image)
                                                    <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                                @endforeach
                                            </ol>

                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">
                                                @foreach(json_decode($post->adv_img) as $image)
                                                    <div class="item {{ $loop->first ? ' active' : '' }}" >
                                                        <img src="/storage/cover_images/{{ $image }}" >
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Controls -->
                                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>

                                </div>
                                <div class="col-lg-7">
                                     <h1 class="product-header mb-10">{{ $post->title }}</h1>
                                      <div class="price mb-20">
                                                    <h2 class="price" style="color: rgb(52, 135, 0);">
                                                        <span class="price-sale" style="color: rgb(97, 97, 97);">
                                                            Rs.{{ $post->str_price }}
                                                        </span> 
                                                    Rs.{{ $post->price }}
                                                    </h2>
                                                </div>
                                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                                        <div class="card">
                                            <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                                <h5 class="text-lg">{{ $post->body }}</h5>
                                            </div>
                                            <div class="flex justify-end">
                                                <a href="/deals/{{ $post->title }}" class="text-info badge navbar-btn">MORE DETAIL</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         </div>
                         <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endisset
