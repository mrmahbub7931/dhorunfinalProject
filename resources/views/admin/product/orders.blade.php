@extends('layouts.back-end.app')

@section('title','Orders')

@push('css')
    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/back-end/css/jsgrid.css')}}">
@endpush

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Category
                            <small>dhorun.com</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Products Category</h5>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Customer name</th>
                                    <th>Phone number</th>
                                    <th>Order Product</th>
                                    <th>Order Amount</th>
                                    <th>Order Status</th>
                                    <th>Payment method</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                    @foreach ($orders as $order)
                                        
                                    
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{ date('F d, Y', strtotime($order->created_at)) }}</td>
                                        <td>{{$order->user_name}}</td>
                                        <td>{{$order->phone_number}}</td>
                                        <td>
                                            @php
                                                $productName = [];
                                            @endphp
                                            @foreach ($order->order_products as $product)
                                                @php
                                                    $productName[] = $product->product_name;
                                                    echo implode(' &#9830;&#9830; ',$productName);
                                                @endphp
                                            @endforeach
                                        </td>
                                        <td>&#2547; {{ $order->order_total }} for {{count($order->order_products)}} item </td>
                                        <td>{{$order->order_status}}</td>
                                        <td>{{$order->payment_method}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="fa fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="">Edit</a>
                                                <button class="dropdown-item" onclick="deleteCategory()">Delete</button>
                                                <form id="delete-form-" action="" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                </div>
                                              </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection

@push('js')
    <!-- Jsgrid js-->
    <script src="{{asset('assets/back-end/js/jsgrid/jsgrid.min.js')}}"></script>
    <script src="{{asset('assets/back-end/js/jsgrid/griddata-manage-product.js')}}"></script>
    <script src="{{asset('assets/back-end/js/jsgrid/jsgrid-manage-product.js')}}"></script>
    <script type="text/javascript">
        function deleteCategory(id) {
            const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    event.preventDefault();
    document.getElementById('delete-form-'+id).submit();
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
        }
    </script>
@endpush
