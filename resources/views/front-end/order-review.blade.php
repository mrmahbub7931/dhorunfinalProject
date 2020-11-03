@extends('layouts.front-end.app')

@section('title','Dhorun | Checkout')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                       <h3>Checkout</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Order Review</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--Checkout page section-->
    <div class="Checkout_section mt-100">
       <div class="container">
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="{{route('frontend.checkout')}}" method="POST">
                            @csrf
                            <h3>Billing Details</h3>
                            <div class="row">
                                <input type="hidden" name="user_id" value="{{Auth::check() ? Auth::user()->id : ''}}">
                                <div class="col-lg-6 mb-20">
                                    <label>Full name</label>
                                    <p>{{ $shippingAddress->user_name }}</p>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone number</label>
                                    <p>{{ $shippingAddress->phone_number }}</p>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Address</label>
                                    <address>
                                        {{ $shippingAddress->address }}
                                    </address>     
                                </div>
                                
                                <div class="col-12 mb-20">
                                    <label>Customer Area</label>
                                    <p>{{ $shippingAddress->customer_area }}</p>
                                </div>
                                <input type="hidden" name="customer_area" id="ship_order_area">
                                <input type="hidden" name="flat_rate" id="ship_flat_rate">
                                @if (!Auth::check())
                                <div class="col-12 mb-20">
                                    <input id="account" type="checkbox" data-target="createp_account" />
                                    <label for="account" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">Create an account?</label>

                                    <div id="collapseOne" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <label> Account password   <span>*</span></label>
                                            <input placeholder="password" type="password">  
                                        </div>
                                    </div>
                                </div>
                                @endif     	    	    	    	    	    
                            </div>
                        </form>    
                    </div>
                    <div class="col-lg-6 col-md-6">
                        @if (Session::has('cart'))
                            @php
                                $oldCart = Session::get('cart');
                                $carts = new App\Cart($oldCart);
                                
                            @endphp
                        @endif
                         
                            <h3>Your order</h3> 
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts->items as $cart)
                                        <tr>
                                            <td> {{$cart['item']['product_name']}} <strong> × {{$cart['qty']}}</strong></td>
                                            <td> &#2547; {{$cart['item']['sales_price']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>&#2547; {{$carts->totalPrice}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong>&#2547; {{ $shippingAddress->flat_rate }}</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>&#2547; {{$carts->totalPrice + $shippingAddress->flat_rate}}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>     
                            </div>
                            <form action="{{route('frontend.order.place')}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$shippingAddress->user_id}}">   
                                <input type="hidden" name="user_name" value="{{$shippingAddress->user_name}}">   
                                <input type="hidden" name="phone_number" value="{{$shippingAddress->phone_number}}">   
                                <input type="hidden" name="address" value="{{$shippingAddress->address}}">   
                                <input type="hidden" name="customer_area" value="{{$shippingAddress->customer_area}}">   
                                <input type="hidden" name="shipping_charge" value="{{$shippingAddress->flat_rate}}">   
                                <input type="hidden" name="order_total" value="{{$carts->totalPrice + $shippingAddress->flat_rate}}">   
                                <div class="payment_method">
                                <div class="panel-default">
                                        <input id="payment" name="payment_method" type="radio" value="cash_on_delivery"/>
                                        <label for="payment" >Cash on Delivery</label>
                                    </div>
                                    <div class="order_button">
                                        <button  type="submit">Place order</button> 
                                    </div>    
                                </div> 
                            </form>         
                    </div>
                </div> 
            </div> 
        </div>       
    </div>
    <!--Checkout page section end-->
@endsection

@push('js')
    <script type="text/javascript">
        function getAreaValue() {
            const selectElement = document.querySelector('#order_area');
            const order_area = document.getElementById('ship_order_area');
            const flat_rate = document.getElementById('ship_flat_rate');
            
            order_area.value = `${selectElement.selectedOptions[0].text}`;
            flat_rate.value = `${selectElement.value}`;
        }
    </script>
@endpush