@extends('layouts.back-end.app')

@section('title','Dashboard')

@push('css')
    
@endpush

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Dashboard
                            <small>Multikart Admin panel</small>
                            
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection

@push('js')
    <!--chartist js-->
    <script src="{{asset('assets/back-end/js/chart/chartist/chartist.js')}}"></script>

    <!--chartjs js-->
    <script src="{{asset('assets/back-end/js/chart/chartjs/chart.min.js')}}"></script>
    <!--dashboard custom js-->
    <script src="{{asset('assets/back-end/js/dashboard/default.js')}}"></script>
@endpush
