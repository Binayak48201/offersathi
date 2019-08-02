@extends('layouts.main_body')

@section('content')
	<main id="mainContent" class="main-content">
            <div class="page-container">
                <div class="container">
                    <div class="cart-area ptb-60">
                        <div class="container">
                            <div class="cart-wrapper">
                                <h3 class="h-title mb-30 t-uppercase">My Cart</h3>
                                @if($carts->count())
                                <table id="cart_list" class="cart-list mb-30">
                                    <thead class="panel t-uppercase">
                                        <tr>
                                            <th>Product name</th>
                                            <th>Unit price</th>
                                            <th>Quantity</th>
                                            <th>Sub total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($carts as $cart)
                                        <tr class="panel alert">
                                            <td>
                                                <div class="media-left is-hidden-sm-down">
                                                    <figure class="product-thumb">
                                                        <img src="/storage/cover_images/{{ current(json_decode
                                                        ($cart->adv_img)) }}">
                                                    </figure>
                                                </div>
                                                <div class="media-body valign-middle">
                                                    <h6 class="title mb-15 t-uppercase">
                                                    	<a href="/deals/{{ $cart->title }}">{{ $cart->title }}</a>
                                                    </h6>
                                                </div>
                                            </td>
                                            <td>
                                            	{{  $cart->price }}
                                            </td>
                                            <td>
                                                {{  $cart->cart_count }}
                                            </td>
                                            <td>
                                                <div class="sub-total">	{{ $cart->price * $cart->cart_count }}</div>
                                            </td>
                                            <td>
                                            	<form method="POST" action="{{action('CartController@destroy', $cart->users_id)}}">
                                            		@csrf
                                            		{{method_field('DELETE')}}
	                                                <button type="submit" class="close" 
	                                                		aria-hidden="true">
	                                                    	<i class="fa fa-trash-o"></i>
	                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif

                                @if($carts->count() == 0)
                                	<p>Please add some items to your cart</p>
                                    <a href="/">Continue</a>
                                @endif

{{--                                <div class="cart-price">--}}
{{--                                    <h5 class="t-uppercase mb-20">Cart total</h5>--}}
{{--                                    <ul class="panel mb-20">--}}
{{--                                        <li>--}}
{{--                                            <div class="item-name">--}}
{{--                                                Subtotal--}}
{{--                                            </div>--}}
{{--                                            <div class="price">--}}
{{--                                                $68.50--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="item-name">--}}
{{--                                                Shipping--}}
{{--                                            </div>--}}
{{--                                            <div class="price">--}}
{{--                                                $68.50--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="item-name">--}}
{{--                                                <strong class="t-uppercase">Order total</strong>--}}
{{--                                            </div>--}}
{{--                                            <div class="price">--}}
{{--                                                <span>$150.50</span>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="t-right">--}}
{{--                                        <a href="checkout_method.html" class="btn btn-rounded btn-lg">CHECKOUT</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
@endsection