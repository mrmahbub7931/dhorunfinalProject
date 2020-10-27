@extends('layouts.front-end.app')

@section('title','Dhorun.com')

@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                   <h3>Cart</h3>
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<!--shopping cart area start -->
<div class="shopping_cart_area mt-100">
    <div class="container">  
        <form action="#"> 
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">

                            <table>
                        <thead>
                            <tr>
                                <th class="product_remove">Delete</th>
                                <th class="product_thumb">Image</th>
                                <th class="product_name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product_quantity">Quantity</th>
                                <th class="product_total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($products))
                            {{-- {{ dd($products) }} --}}
                            @foreach ($products as $product)
                            <tr>
                                <td class="product_remove" data-slug="{{$product['item']['slug']}}"><a href="{{route('frontend.cart.remove',$product['item']['slug'])}}"><i class="fa fa-trash-o"></i></a></td>

                                <td class="product_thumb"><a href="{{route('frontend.product-details',$product['item']['slug'])}}"><img src="{{ $product['item']['image_src'] }}" alt=""></a></td>
                                <td class="product_name"><a href="{{route('frontend.product-details',$product['item']['slug'])}}">{{ $product['item']['product_name'] }}</a></td>
                                <td class="product-price">{{ $product['item']['sales_price'] }} TK.</td>
                                <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="{{$product['qty']}}" type="number"></td>
                                <td class="product_total">{{$product['price']}} TK.</td>
                                
                            </tr>
                            
                            @endforeach
                            @endif
                        </tbody>
                    </table>   
                        </div>
                    </div>
                 </div>
             </div>
             <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">   
                                <p>Enter your coupon code if you have one.</p>                                
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                            </div>    
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                               <div class="cart_subtotal">
                                   <p>Subtotal</p>
                                   <p class="cart_amount">&#2547; {{ $totalPrice }}</p>
                               </div>
                               {{-- <div class="cart_subtotal ">
                                   <p>Shipping</p>
                                   <p class="cart_amount"> £255.00</p>
                               </div>
                               <a href="#">Calculate shipping</a> --}}

                               {{-- <div class="cart_subtotal">
                                   <p>Total</p>
                                   <p class="cart_amount">&#2547; {{ $totalPrice }}</p>
                               </div> --}}
                               <div class="checkout_btn">
                                   <a href="#">Proceed to Checkout</a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form> 
    </div>     
</div>
 <!--shopping cart area end -->

@endsection

@push('js')
    <script>
        // $(".remove-from-cart").click(function (e) {
        //     e.preventDefault();
        //     var ele = $(this);
        //     if(confirm("Are you sure")) {
        //         $.ajax({
        //             url: '{{ url('remove-from-cart') }}',
        //             method: "DELETE",
        //             data: {_token: '{{ csrf_token() }}', id: ele.attr("data-slug")},
        //             success: function (response) {
        //                 console.log(response);
        //                 // window.location.reload();
        //             }
        //         });
        //     }
        // });
    </script>
@endpush