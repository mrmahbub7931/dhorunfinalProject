@extends('layouts.front-end.app')

@section('title','User Account')

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
        
        <!-- my account start  -->
        <section class="main_content_area">
            <div class="container">   
                <div class="account_dashboard">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <!-- Nav tabs -->
                            <div class="dashboard_tab_button">
                                <ul role="tablist" class="nav flex-column dashboard-list">
                                    <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                    <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                    <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li>
                                    <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                                    {{-- <li><a href="login.html" class="nav-link">logout</a></li> --}}
                                    <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </div>    
                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard_content">
                                <div class="tab-pane fade show active" id="dashboard">
                                    <h3>Dashboard </h3>
                                    <p>From your account dashboard. you can easily check &amp; view your <a href="javascript:void(0)">recent orders</a>, manage your <a href="javascript:void(0)">shipping and billing addresses</a> and <a href="javascript:void(0)">Edit your password and account details.</a></p>
                                </div>
                                <div class="tab-pane fade" id="orders">
                                    <h3>Orders</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Order Product</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>	 	 	 	
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($order_products as $products)
                                                    
                                                    {{-- @foreach ($products->order_products as $product)
                                                            {{ $product->product_name }}
                                                        @endforeach --}}
                                                
                                                <tr>
                                                    <td>{{$products->id}}</td>
                                                    <td>
                                                        @php
                                                            $productName = [];
                                                        @endphp
                                                        @foreach ($products->order_products as $product)
                                                            @php
                                                                $productName[] = $product->product_name;
                                                                echo implode(' &#9830;&#9830; ',$productName);
                                                            @endphp
                                                        @endforeach
                                                    </td>
                                                    <td>{{ date('F d, Y', strtotime($products->created_at)) }}</td>
                                                    <td><span class="success">{{$products->order_status}}</span></td>
                                                    <td>&#2547; {{ $products->order_total }} for {{count($products->order_products)}} item </td>
                                                    <td><a href="javascript:void(0)" class="view">view</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="address">
                                   <p>The following addresses will be used on the checkout page by default.</p>
                                    <h4 class="billing-address">Billing address</h4>
                                    
                                    <p><strong>{{Auth::user()->name}}</strong></p>
                                    <address>
                                        @if (Auth::user()->address === NULL)
                                            <p>Billing address is Empty.</p>
                                            @else
                                            {{ Auth::user()->address }}
                                        @endif
                                    </address>
                                    <p>Bangladesh</p>
                                </div>
                                <div class="tab-pane fade" id="account-details">
                                    <h3>Account details </h3>
                                    <div class="login">
                                        <div class="login_form_container">
                                            <div class="account_login_form">
                                                <form action="{{route('frontend.user.details',Auth::user()->id)}}" method="POST" id="userDetails">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="currentUserId" id="currentUserId" value="{{Auth::user()->id}}">
                                                    <label>FUll Name</label>
                                                    <input type="text" name="name" value="{{ Auth::user()->name }}">
                                                    <label>Phone number</label>
                                                    <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}">
                                                    <h4 class="billing-address">Billing address</h4>
                                                    <label for="address" class="mb-1">Customer Address</label>
                                                            <textarea class="form-control" name="address" id="address" placeholder="Address">@if(Auth::user()->address !== NULL){{ Auth::user()->address }}@endif</textarea>
                                                    
                                                    <a href="javascript:void(0)" class="righ_0" data-toggle="collapse" data-target="#chngpassword" aria-controls="collapseOne" style="margin-top: 10px;display:block">Change Password</a>
                                                    <div id="chngpassword" class="collapse one" data-parent="#accordion">
                                                        <label for="old_password" class="col-form-label">Old Password:</label>
                                <input type="password" id="old_password" name="old_password" placeholder="password">
                                <label for="password" class="col-form-label">New Password:</label>
                                <input id="password" type="password" name="password" autocomplete="current-password" placeholder="Password">
                                                    </div>
                                                    <div class="save_button primary_btn default_button">
                                                       <button type="submit">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>        	
        </section>			
        <!-- my account end   --> 
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            
            $('#userDetails').on('submit',function (e) {
                e.preventDefault();
                var id = $('#currentUserId').val();
                
                $.ajax({
                    type: "PUT",
                    url: "/user/account/"+id,
                    data: $('#userDetails').serialize(),
                    success: function (response) {
                        location.reload();
                    }
                });
            });

        });
    </script>
@endpush
    
    