@extends('layouts.front-end.app')

@section('title','Login')

@push('css')
    
@endpush

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                       <h3>My Account</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form action="#">
                            <p>   
                                <label for="phone_number">Phone number <span>*</span></label>
                                <input type="text" name="phone_number" id="phone_number">
                             </p>
                             <p>   
                                <label for="password">Passwords <span>*</span></label>
                                <input type="password" id="password" name="password">
                             </p>   
                            <div class="login_submit">
                               <a href="#">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label>
                                <button type="submit">login</button>
                                
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form action="{{route('frontend.user.register')}}" method="post" id="user-register">
                            @csrf
                            <p>   
                                <label for="name">Name  <span>*</span></label>
                                <input type="text" name="name" id="name">
                             </p>
                            <p>   
                                <label for="phone_number">Phone Number  <span>*</span></label>
                                <input type="text" name="phone_number" id="phone_number">
                             </p>
                             <p>   
                                <label for="password">Passwords <span>*</span></label>
                                <input type="password" name="password" id="password">
                             </p>
                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->

    <!--brand area start-->
    <div class="brand_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="{{asset('assets/front-end/img/brand/brand1.png')}}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{asset('assets/front-end/img/brand/brand2.png')}}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{asset('assets/front-end/img/brand/brand3.png')}}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{asset('assets/front-end/img/brand/brand4.png')}}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{asset('assets/front-end/img/brand/brand5.png')}}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{asset('assets/front-end/img/brand/brand6.png')}}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{asset('assets/front-end/img/brand/brand2.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->
@endsection

@push('js')
    
@endpush
    
    