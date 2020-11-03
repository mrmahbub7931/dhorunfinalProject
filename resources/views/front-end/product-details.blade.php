@extends('layouts.front-end.app')

@section('title','Dhorun.com')

@section('content')
    <!--product details start-->
    {{-- {{ dd($product) }} --}}
    <div class="product_details mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{$product->featured_image}}" data-zoom-image="{{$product->featured_image}}" alt="big-1">
                            </a>
                        </div>
                        {{-- <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/productbig4.jpg" data-zoom-image="assets/img/product/productbig4.jpg">
                                        <img src="assets/img/product/productbig4.jpg" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/productbig1.jpg" data-zoom-image="assets/img/product/productbig1.jpg">
                                        <img src="assets/img/product/productbig1.jpg" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/productbig2.jpg" data-zoom-image="assets/img/product/productbig2.jpg">
                                        <img src="assets/img/product/productbig2.jpg" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/productbig3.jpg" data-zoom-image="assets/img/product/productbig3.jpg">
                                        <img src="assets/img/product/productbig3.jpg" alt="zo-th-1"/>
                                    </a>

                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       {{-- <form action="{{route('frontend.product.addToCart',$product['id'])}}" method="POST">
                           @csrf --}}
                           {{-- <input type="hidden" value="{{$product['id']}}" name="product_id">
                           <input type="hidden" value="{{$product['product_name']}}" name="product_name">
                           <input type="hidden" value="{{$product['sku']}}" name="product_code">
                           <input type="hidden" value="{{$product['size']}}" name="product_size">
                           <input type="hidden" value="{{$product['color']}}" name="product_color">
                           <input type="hidden" value="{{$product['sales_price']}}" name="price"> --}}
                            <h1><a href="javascript:void(0)">{{$product->name}}</a></h1>
                            {{-- <div class="product_nav">
                                <ul>
                                    <li class="prev"><a href="product-details.html"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="next"><a href="variable-product.html"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div> --}}
                            {{-- <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                </ul>
                                
                            </div> --}}
                            <p class="unity">{{ $product->unity }}</p>
                            <div class="price_box">
                                @if($product->discount !== NULL) 
                                    <span class="current_price">{{round((1 - ($product->discount/100)) * $product->price)}}TK</span>
                                    <span class="old_price">{{$product->price}}TK</span>
                                @else
                                    <span class="current_price">{{$product->price}}TK</span>
                                @endif
                                
                            </div>
                            <div class="product_desc">
                                <p>{{$product->short_desc}}</p>
                            </div>
                            {{-- <div class="product_variant color">
                                <h3>Available Options</h3>
                                <label>color</label>
                                <ul>
                                    <li class="color1"><a href="#"></a></li>
                                    <li class="color2"><a href="#"></a></li>
                                    <li class="color3"><a href="#"></a></li>
                                    <li class="color4"><a href="#"></a></li>
                                </ul>
                            </div> --}}
                            <form action="{{route('frontend.product.addToCart',$product->slug)}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="image_src" value="{{$product->featured_image}}">
                                <input type="hidden" name="product_name" value="{{$product->name}}">
                                <input type="hidden" name="slug" value="{{$product->slug}}">
                                <input type="hidden" name="product_code" value="{{$product['sku']}}">
                                @if($product->discount !== NULL) 
                                <input type="hidden" name="sales_price" value="{{round((1 - ($product->discount/100)) * $product->price)}}">
                                @else 
                                <input type="hidden" name="sales_price" value="{{$product->price}}">
                                @endif
                                <div class="product_variant quantity">
                                    <label>quantity</label>
                                    <input min="1" max="100" placeholder="1" type="number" name="quantity">
                                    <button class="button" type="submit">add to cart</button>
                                    
                                </div>
                            </form>
                            
                            {{-- <div class=" product_d_action">
                               <ul>
                                   <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                                   <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                               </ul>
                            </div> --}}
                            <div class="product_meta">
                                <span>Category: @foreach ($product->categories as $category)
                                    
                                <a href="{{$category['slug']}}">{{$category['name']}}</a>@endforeach</span>
                            </div>
                            
                        {{-- </form> --}}
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>           
                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>           
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>           
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>        
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>        
                            </ul>      
                        </div>

                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->
@endsection