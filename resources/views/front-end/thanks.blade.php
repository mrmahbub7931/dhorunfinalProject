@extends('layouts.front-end.app')

@section('title','Dhorun.com')

@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if (Session::has('order_id'))
                        <p>Your order number is <strong>{{Session::get('order_id')}}</strong> and total payable amount is <strong>{{Session::get('order_total')}}</strong></p>
                    @endif
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->



@endsection
@php
    Session::forget('order_id');
    Session::forget('order_total');
@endphp
@push('js')
    
@endpush