@extends('layouts.front-end.app')

@section('title','Dhorun')

@section('content')
    <!--slider area start-->
    <section class="slider_section">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="{{asset('assets/front-end/img/slider/slider1.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>BIG SALE</h1>
                                <p>Discount <span>20% Off </span> For Lukani Members </p> 
                                <a class="button" href="shop.html">Discover Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="{{asset('assets/front-end/img/slider/slider2.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>TOP SALE</h1>
                                <p>Discount <span>20% Off </span> For Lukani Members </p> 
                                <a class="button" href="shop.html">Discover Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="{{asset('assets/front-end/img/slider/slider3.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>Lovely Plants </h1>
                                <p>Discount <span>20% Off </span> For Lukani Members </p>
                                <a class="button" href="shop.html">Discover Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->
    
    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="{{asset('assets/front-end/img/about/shipping1.png')}}" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Free Delivery</h3>
                            <p>Free shipping around the world for all <br> orders over $120</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_2">
                        <div class="shipping_icone">
                            <img src="{{asset('assets/front-end/img/about/shipping2.png')}}" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Safe Payment</h3>
                            <p>With our payment gateway, don’t worry <br> about your information</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_3">
                        <div class="shipping_icone">
                            <img src="{{asset('assets/front-end/img/about/shipping3.png')}}" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Friendly Services</h3>
                            <p>You have 30-day return guarantee for <br> every single order</p>

                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
    <!--shipping area end-->
    
    <!--banner area start-->
    <div class="banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="{{asset('assets/front-end/img/bg/banner1.jpg')}}" alt=""></a> 
                            <div class="banner_content">
                                <h3>Big Sale Products</h3>
                                <h2>Plants <br> For Interior</h2>
                                <a href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="{{asset('assets/front-end/img/bg/banner2.jpg')}}" alt=""></a> 
                            <div class="banner_content">
                                <h3>Top Products</h3>
                                <h2>Plants <br> For Healthy</h2>
                                <a href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->
        
    <!--product area start-->
    <div class="product_area  mb-95">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                           <h2>আমাদের পন্য</h2>
                        </div>
                        <div class="product_tab_btn">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#plant1" role="tab" aria-controls="plant1" aria-selected="true"> 
                                        ফলমূল
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#plant2" role="tab" aria-controls="plant2" aria-selected="false">
                                        মুদি বাজার
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#plant3" role="tab" aria-controls="plant3" aria-selected="false">
                                        শপিং
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="tab-content">
                <div class="tab-pane fade show active" id="plant1" role="tabpanel">
                    <div class="row">
                        <div class="product_carousel product_column4 owl-carousel">
                            @foreach ($products as $product)
                            {{-- {{ dd($product) }} --}}
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="javascript:void(0)"><img src="{{$product['featured_image']}}" alt=""></a>
                                                <div class="label_product">
                                                    @if($product['discount'] !== NULL)<span class="label_sale">-{{$product['discount'] }}%</span>@endif
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        
                                                        <li class="add_to_cart"><a href="{{route('frontend.product.addToCart',$product['slug'])}}" title="Add to cart" onclick="event.preventDefault();document.getElementById('cart-form-{{$product['slug']}}').submit();"><i class="icon-shopping-bag"></i></a></li>

                                                        <form id="cart-form-{{$product['slug']}}" action="{{route('frontend.product.addToCart',$product['slug'])}}" method="POST" style="display: none">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$product['id']}}">
                                                    <input type="hidden" name="image_src" value="{{$product['featured_image']}}">
                                                    <input type="hidden" name="product_name" value="{{$product['name']}}">
                                                    <input type="hidden" name="slug" value="{{$product['slug']}}">
                                                    @if($product['discount'] !== NULL) 
                                                    <input type="hidden" name="sales_price" value="{{round((1 - ($product['discount']/100)) * $product['price'])}}">
                                                    @else
                                                    <input type="hidden" name="sales_price" value="{{$product['price']}}">
                                                    @endif
                                                    <input min="1" max="100" value="1" type="number" name="quantity">
                                                        </form>
                                                        <li class="compare"><a href="javascript:void(0)" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                    <li class="quick_button"><a href="javascript:void(0)" data-toggle="modal" data-target="#modal_box_{{$product['id']}}"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                            <h4 class="product_name"><a href="{{route('frontend.product-details',$product['slug'])}}">{{ $product['name'] }}</a></h4>
                                                <div class="price_box">
                                                    @if($product['discount'] !== NULL) 
                                                    <span class="current_price">{{round((1 - ($product['discount']/100)) * $product['price'])}}TK</span>
                                                    <span class="old_price">{{$product['price']}}TK</span>
                                                    @else
                                                    <span class="current_price">{{$product['price']}}TK</span>
                                                    @endif
                                                </div>
                                            </figcaption>
                                        </figure>
                                         
                                    </article>
                                    
                                    {{-- <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product2.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-9%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">eget sagittis</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£65.00</span>
                                                    <span class="old_price">£70.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article> --}}
                                </div>
                            </div>
                            
                            @endforeach
                        </div> 
                    </div>   
                </div>
                <div class="tab-pane fade" id="plant2" role="tabpanel">
                    <div class="row">
                        <div class="product_carousel product_column4 owl-carousel">
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product7.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-4%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">sapien libero</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£69.00</span>
                                                    <span class="old_price">£74.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product8.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-6%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">vulputate rutrum</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£64.00</span>
                                                    <span class="old_price">£72.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product9.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-8%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">adipiscing cursus</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£60.00</span>
                                                    <span class="old_price">£70.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product10.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-9%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">Donec eu cook</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£67.00</span>
                                                    <span class="old_price">£77.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product1.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-7%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">commodo augue nisi</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£69.00</span>
                                                    <span class="old_price">£74.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product2.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-9%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">eget sagittis</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£65.00</span>
                                                    <span class="old_price">£70.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product3.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-6%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">fringilla augue</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£68.00</span>
                                                    <span class="old_price">£75.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product4.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-5%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">massa massa</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£75.00</span>
                                                    <span class="old_price">£80.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product5.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-8%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">placerat vestibulum</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£65.00</span>
                                                    <span class="old_price">£70.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product6.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-9%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">Porro Cook</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£62.00</span>
                                                    <span class="old_price">£68.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div> 
                        </div> 
                    </div>
                </div>
                <div class="tab-pane fade" id="plant3" role="tabpanel">
                    <div class="row">
                        <div class="product_carousel product_column4 owl-carousel">
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product3.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-6%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">fringilla augue</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£68.00</span>
                                                    <span class="old_price">£75.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product4.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-5%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">massa massa</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£75.00</span>
                                                    <span class="old_price">£80.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product5.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-8%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">placerat vestibulum</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£65.00</span>
                                                    <span class="old_price">£70.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product6.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-9%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">Porro Cook</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£62.00</span>
                                                    <span class="old_price">£68.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product7.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-4%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">sapien libero</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£69.00</span>
                                                    <span class="old_price">£74.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product8.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-6%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">vulputate rutrum</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£64.00</span>
                                                    <span class="old_price">£72.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div>  
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product1.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-7%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">commodo augue nisi</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£69.00</span>
                                                    <span class="old_price">£74.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product2.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-9%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">eget sagittis</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£65.00</span>
                                                    <span class="old_price">£70.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product9.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-8%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">adipiscing cursus</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£60.00</span>
                                                    <span class="old_price">£70.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product10.jpg')}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-9%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i class="icon-sliders"></i></a></li>
                                                         <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>    
                                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                   </ul>
                                                </div>
                                                <h4 class="product_name"><a href="product-details.html">Donec eu cook</a></h4>
                                                <div class="price_box"> 
                                                    <span class="current_price">£67.00</span>
                                                    <span class="old_price">£77.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div> 
                        </div> 
                    </div> 
                </div>
            </div>
        </div> 
    </div>
    <!--product area end-->
    
    <!--product area start-->
    <div class="product_area product_deals ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                       <h2>Today Deals</h2>
                    </div>
                </div>
            </div> 
            <div class="product_deals_container">
                <div class="row">
                    <div class="product_carousel product_column5 owl-carousel">
                        <div class="col-lg-3">
                            <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product1.jpg')}}" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">-7%</span>
                                            </div>
                                            <div class="product_timing">
                                                <div data-countdown="2020/12/15"></div>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="product_rating">
                                               <ul>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                               </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">commodo augue nisi</a></h4>
                                            <div class="price_box"> 
                                                <span class="current_price">£69.00</span>
                                                <span class="old_price">£74.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                        </div>        
                        <div class="col-lg-3">        
                            <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product2.jpg')}}" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">-9%</span>
                                            </div>
                                            <div class="product_timing">
                                                <div data-countdown="2020/12/15"></div>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="product_rating">
                                               <ul>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                               </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">eget sagittis</a></h4>
                                            <div class="price_box"> 
                                                <span class="current_price">£65.00</span>
                                                <span class="old_price">£70.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                        </div> 
                        <div class="col-lg-3">
                            <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product3.jpg')}}" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">-6%</span>
                                            </div>
                                            <div class="product_timing">
                                                <div data-countdown="2020/12/15"></div>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="product_rating">
                                               <ul>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                               </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">fringilla augue</a></h4>
                                            <div class="price_box"> 
                                                <span class="current_price">£68.00</span>
                                                <span class="old_price">£75.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                        </div>        
                        <div class="col-lg-3">        
                            <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product4.jpg')}}" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">-5%</span>
                                            </div>
                                            <div class="product_timing">
                                                <div data-countdown="2020/12/15"></div>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="product_rating">
                                               <ul>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                               </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">massa massa</a></h4>
                                            <div class="price_box"> 
                                                <span class="current_price">£75.00</span>
                                                <span class="old_price">£80.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                        </div> 
                        
                        <div class="col-lg-3">
                            <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product5.jpg')}}" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">-8%</span>
                                            </div>
                                           <div class="product_timing">
                                                <div data-countdown="2020/12/15"></div>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="product_rating">
                                               <ul>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                               </ul>
                                            </div>
                                            <h4 class="product_name"><a href="product-details.html">placerat vestibulum</a></h4>
                                            <div class="price_box"> 
                                                <span class="current_price">£65.00</span>
                                                <span class="old_price">£70.00</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                        </div>        
                        <div class="col-lg-3">        
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="{{asset('assets/front-end/img/product/product6.jpg')}}" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-9%</span>
                                        </div>
                                        <div class="product_timing">
                                            <div data-countdown="2020/12/15"></div>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <div class="product_rating">
                                           <ul>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                           </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">Porro Cook</a></h4>
                                        <div class="price_box"> 
                                            <span class="current_price">£62.00</span>
                                            <span class="old_price">£68.00</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div> 
                    </div> 
                </div>   
            </div>
        </div> 
    </div>
    <!--product area end-->
    
    <!--testimonial area start-->
    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                       <h2>What Our Customers Says ?</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial_container">
                <div class="row">
                    <div class="testimonial_carousel owl-carousel">
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="{{asset('assets/front-end/img/about/testimonials-icon.png')}}" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                    it truly is an artwork. I love how my website operates and looks with this theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="{{asset('assets/front-end/img/about/testimonial1.png')}}" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Rebecka Filson</a> / <span>CEO of CSC</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="{{asset('assets/front-end/img/about/testimonials-icon.png')}}" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                    it truly is an artwork. I love how my website operates and looks with this theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="{{asset('assets/front-end/img/about/testimonial2.png')}}" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Amber Laha</a> / <span>CEO of DND</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="{{asset('assets/front-end/img/about/testimonials-icon.png')}}" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                    it truly is an artwork. I love how my website operates and looks with this theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="{{asset('assets/front-end/img/about/testimonial3.png')}}" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Lindsy Neloms</a> / <span>CEO of SFD</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--testimonial area end-->
    
    <!--blog area start-->
    <section class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                       <h2>Our Latest Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog_carousel blog_column3 owl-carousel">
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img src="{{asset('assets/front-end/img/blog/blog1.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                   <h4 class="post_title"><a href="blog-details.html">Libero lorem</a></h4>
                                   <div class="articles_date">
                                        <p>By <span>admin / July 16, 2019</span></p>
                                    </div>
                                    <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus praesent</p>
                                    <footer class="blog_footer">
                                        <a href="blog-details.html">Continue Reading</a>
                                        <p><i class="icon-message-circle"></i> <span>0</span></p>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img src="{{asset('assets/front-end/img/blog/blog2.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                   <h4 class="post_title"><a href="blog-details.html">Blog image post</a></h4>
                                   <div class="articles_date">
                                        <p>By <span>admin / July 16, 2019</span></p>
                                    </div>
                                    <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus praesent</p>
                                    <footer class="blog_footer">
                                        <a href="blog-details.html">Continue Reading</a>
                                        <p><i class="icon-message-circle"></i> <span>0</span></p>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img src="{{asset('assets/front-end/img/blog/blog3.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                   <h4 class="post_title"><a href="blog-details.html">Post with Gallery</a></h4>
                                   <div class="articles_date">
                                        <p>By <span>admin / July 16, 2019</span></p>
                                    </div>
                                    <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus praesent</p>
                                    <footer class="blog_footer">
                                        <a href="blog-details.html">Continue Reading</a>
                                        <p><i class="icon-message-circle"></i> <span>0</span></p>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img src="{{asset('assets/front-end/img/blog/blog2.jpg')}}" alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                   <h4 class="post_title"><a href="blog-details.html">Post with Audio</a></h4>
                                   <div class="articles_date">
                                        <p>By <span>admin / July 16, 2019</span></p>
                                    </div>
                                    <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus praesent</p>
                                    <footer class="blog_footer">
                                        <a href="blog-details.html">Continue Reading</a>
                                        <p><i class="icon-message-circle"></i> <span>0</span></p>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog area end-->
    <!-- modal area start-->
@foreach ($products as $product)
<div class="modal fade" id="modal_box_{{$product['id']}}" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="icon-x"></i></span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">  
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{$product['featured_image']}}" alt=""></a>    
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{asset('assets/front-end/img/product/productbig2.jpg')}}" alt=""></a>    
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{asset('assets/front-end/img/product/productbig3.jpg')}}" alt=""></a>    
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{asset('assets/front-end/img/product/productbig4.jpg')}}" alt=""></a>    
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="modal_tab_button">    
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li >
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{asset('assets/front-end/img/product/product1.jpg')}}" alt=""></a>
                                        </li>
                                        <li>
                                             <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="{{asset('assets/front-end/img/product/product2.jpg')}}" alt=""></a>
                                        </li>
                                        <li>
                                           <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="{{asset('assets/front-end/img/product/product3.jpg')}}" alt=""></a>
                                        </li>
                                        <li>
                                           <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="{{asset('assets/front-end/img/product/product8.jpg')}}" alt=""></a>
                                        </li>

                                    </ul>
                                </div>     --}}
                            </div>  
                        </div> 
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>{{$product['name']}}</h2> 
                                </div>
                                <div class="modal_price mb-10"> 
                                    @if($product['discount'] !== NULL) 
                                        <span class="new_price">{{round((1 - ($product['discount']/100)) * $product['price'])}}TK</span>
                                        <span class="old_price">{{$product['price']}}TK</span>
                                    @else
                                        <span class="new_price">{{$product['price']}}TK</span>
                                    @endif  
                                </div>
                                <p>{{ $product['unity'] }}</p>
                                <div class="modal_description mb-15">
                                    <p>{{ $product['short_desc'] }}</p>    
                                </div> 
                                <div class="variants_selects">
                                    {{-- <div class="variants_size">
                                       <h2>size</h2>
                                       <select class="select_option">
                                           <option selected value="1">s</option>
                                           <option value="1">m</option>
                                           <option value="1">l</option>
                                           <option value="1">xl</option>
                                           <option value="1">xxl</option>
                                       </select>
                                    </div>
                                    <div class="variants_color">
                                       <h2>color</h2>
                                       <select class="select_option">
                                           <option selected value="1">purple</option>
                                           <option value="1">violet</option>
                                           <option value="1">black</option>
                                           <option value="1">pink</option>
                                           <option value="1">orange</option>
                                       </select>
                                    </div> --}}
                                    <div class="modal_add_to_cart">
                                        <form action="{{route('frontend.product.addToCart',$product['slug'])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$product['id']}}">
                                            <input type="hidden" name="image_src" value="{{$product['featured_image']}}">
                                            <input type="hidden" name="product_name" value="{{$product['productName']}}">
                                            <input type="hidden" name="slug" value="{{$product['slug']}}">
                                            <input type="hidden" name="sales_price" value="{{$product['sales_price']}}">
                                            <input min="1" max="100" placeholder="1" type="number" name="quantity">
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>   
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>    
                                </div>      
                            </div>    
                        </div>    
                    </div>     
                </div>
            </div>    
        </div>
    </div>
</div>
<!-- modal area end-->
@endforeach
@endsection
    
    