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
                            <li>Checkout</li>
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
            <div class="row">
               <div class="col-12">
                    @if (!Auth::check())
                    <div class="user-actions">
                        <h3> 
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click here to login</a>     

                        </h3>
                         <div id="checkout_login" class="collapse" data-parent="#accordion">
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <div class="checkout_info">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>  
                                <form action="{{ route('frontend.user.login') }}" method="POST"> 
                                    @csrf 
                                    <div class="form_group">
                                        <label for="phone_number">Phone number <span>*</span></label>
                                        <input type="text" name="phone_number" id="phone_number">     
                                    </div>
                                    <div class="form_group">
                                        <label for="password">Passwords <span>*</span></label>
                                        <input type="password" id="password" name="password">   
                                    </div> 
                                    <div class="form_group group_3 ">
                                        <button type="submit">Login</button>
                                        <label for="remember_box">
                                            <input id="remember_box" type="checkbox">
                                            <span> Remember me </span>
                                        </label>     
                                    </div>
                                    {{-- <a href="#">Lost your password?</a> --}}
                                </form>          
                            </div>
                        </div>    
                    </div>
                    @endif
                    {{-- <div class="user-actions">
                        <h3> 
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a>     

                        </h3>
                         <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                            <div class="checkout_info coupon_info">
                                <form action="#">
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </form>
                            </div>
                        </div>    
                    </div>     --}}
               </div>
            </div>
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="{{route('frontend.checkout')}}" method="POST">
                            @csrf
                            <h3>Billing Details</h3>
                            <div class="row">
                                <input type="hidden" name="user_id" value="{{Auth::check() ? Auth::user()->id : ''}}">
                                <div class="col-lg-6 mb-20">
                                    <label>Full name <span>*</span></label>
                                <input type="text" value="{{Auth::check() ? Auth::user()->name : ''}}" name="name" id="name">    
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone number <span>*</span></label>
                                    <input type="text" value="{{Auth::check() ? Auth::user()->phone_number : ''}}" name="phone_number" id="phone_number"> 
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Address</label>
                                    <textarea name="address" id="address" class="form-control" style="resize: none">@if (Auth::check()) @if (Auth::user()->address === NULL)<p>Billing address is Empty.</p>@else{{ Auth::user()->address }}@endif @endif</textarea>     
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="order_area">Customer Area <span>*</span></label>
                                    <select class="select_option" id="order_area" onchange="getAreaValue()"> 
                                        <option value="0">Select Area</option>
                                        @foreach ($customerareas as $ca)
                                            <option value="{{$ca->flat_rate}}">{{$ca->order_area}}</option>
                                        @endforeach
                                    </select>
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
                                <div class="order_button">
                                    <button  type="submit">Proceed to Checkout</button> 
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