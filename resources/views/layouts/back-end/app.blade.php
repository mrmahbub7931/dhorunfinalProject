<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/multikart/back-end/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Aug 2020 11:41:25 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/dashboard/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/dashboard/favicon.png" type="image/x-icon">

    <title>@yield('title')</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <!-- DataTables -->
     <link href="{{asset('assets/back-end/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('assets/back-end/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
     <!-- Responsive datatable examples -->
     <link href="{{asset('assets/back-end/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> 


    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back-end/css/font-awesome.min.css')}}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back-end/css/flag-icon.css')}}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back-end/css/icofont.css')}}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back-end/css/prism.css')}}">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back-end/css/chartist.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back-end/css/bootstrap.css')}}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back-end/css/admin.css')}}">
    @stack('css')
</head>

<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    @include('layouts.back-end.partials.header')
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <!-- Page Sidebar Start-->
        @include('layouts.back-end.partials.left-sidebar')
        <!-- Page Sidebar Ends-->

        {{-- page-body starts --}}
        <div class="page-body">
            @yield('content')
        </div>
        {{-- page-body ends --}}
        <!-- footer start-->
        @include('layouts.back-end.partials.footer')
        <!-- footer end-->
    </div>

</div>

<!-- latest jquery-->
<script src="{{asset('assets/back-end/js/jquery-3.3.1.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/back-end/js/popper.min.js')}}"></script>
<script src="{{asset('assets/back-end/js/bootstrap.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('assets/back-end/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/back-end/js/icons/feather-icon/feather-icon.js')}}"></script>

<!-- Sidebar jquery-->
<script src="{{asset('assets/back-end/js/sidebar-menu.js')}}"></script>


<!--copycode js-->
<script src="{{asset('assets/back-end/js/prism/prism.min.j')}}s"></script>
<script src="{{asset('assets/back-end/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/back-end/js/custom-card/custom-card.js')}}"></script>

<!--counter js-->
<script src="{{asset('assets/back-end/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/back-end/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/back-end/js/counter/counter-custom.js')}}"></script>

<!--peity chart js-->
<script src="{{asset('assets/back-end/js/chart/peity-chart/peity.jquery.j')}}s"></script>

<!--sparkline chart js-->
<script src="{{asset('assets/back-end/js/chart/sparkline/sparkline.js')}}"></script>



<!--right sidebar js-->
<script src="{{asset('assets/back-end/js/chat-menu.js')}}"></script>

<!--height equal js-->
<script src="{{asset('assets/back-end/js/height-equal.js')}}"></script>



<!-- Required datatable js -->
<script src="{{asset('assets/back-end/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/back-end/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('assets/back-end/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/back-end/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/back-end/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{asset('assets/back-end/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/back-end/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/back-end/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/back-end/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/back-end/plugins/datatables/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('assets/back-end/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/back-end/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('assets/back-end/pages/jquery.table-datatable.js')}}"></script> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@stack('js')
<!--Customizer admin-->
<script src="{{asset('assets/back-end/js/admin-customizer.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('assets/back-end/js/lazysizes.min.js')}}"></script>
<!--script admin-->
<script src="{{asset('assets/back-end/js/admin-script.js')}}"></script>
</body>

<!-- Mirrored from themes.pixelstrap.com/multikart/back-end/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Aug 2020 11:42:24 GMT -->
</html>
