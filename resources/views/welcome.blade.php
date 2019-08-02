@extends('layouts.main_body')
    @section('content')
        <main id="mainContent" class="main-content">
            <div class="page-container ptb-10">
                @include('layouts.top_body')
				<div style="margin: 0 auto;max-width: 1328px;width: 100%;">
                @include('layouts.small_adv')
                @include('posts.first_adv')
                @include('posts.smallslider')
                @include('brand.branding')
                    {{-- NEWS INCLUSION --}}
                    @if($news->count())
                        @include('posts.news_show')
                    @endif
                </div>
            </div>
        </main>





    <div id="backTop" class="back-top is-hidden-sm-down">

        <i class="fa fa-angle-up" aria-hidden="true"></i>

    </div>

    @endsection