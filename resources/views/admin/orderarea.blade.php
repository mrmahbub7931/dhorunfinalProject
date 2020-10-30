@extends('layouts.back-end.app')

@section('title','Category')

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
                        <h3>Order Area
                            <small>dhorun.com</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Order Area</li>
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
                        <h5>Order Areas</h5>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#OrderAarea">Add Order Area</button>
                        <div class="modal fade" id="OrderAarea" tabindex="-1" role="dialog" aria-labelledby="OrderAareaLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="OrderAareaLabel">Add Digital Product</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <form class="needs-validation" id="orderAareaFormCreate" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="order_area" class="mb-1">Order Area :</label>
                                                    <input class="form-control" name="order_area" id="order_area" type="text">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label for="flat_rate" class="mb-1">Flat Rate :</label>
                                                    <input class="form-control" name="flat_rate" id="flat_rate" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                                <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Order Area</th>
                                    <th>Flat rate</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                    @foreach ($orderareas as $key => $orderarea)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $orderarea->order_area }}</td>
                                        <td>{{ $orderarea->flat_rate }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="fa fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button type="button" class="dropdown-item">Edit</button>
                                                <form id="delete-orderarea" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="CurrentID" value="{{$orderarea->id}}">
                                                    <button class="dropdown-item" type="submit">Delete</button>
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
        $(document).ready(function () {
            $('#orderAareaFormCreate').on('submit',function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/orderarea",
                    data: $('#orderAareaFormCreate').serialize(),
                    success: function (response) {
                        console.log(response);
                        location.reload();
                    }
                });
            });

            $('#delete-orderarea').on('submit',function (e) {
                e.preventDefault();
                var id = $('#CurrentID').val();
                $.ajax({
                    type: "delete",
                    url: "{{route('admin.orderarea.destroy',"+id+")}}",
                    data: $('#delete-orderarea').serialize(),
                    success: function (response) {
                        // console.log(response);
                        location.reload();
                    }
                });
            });
            $('#update-orderarea').on('submit',function (e) {
                e.preventDefault();
                var id = $('#updateCurrentID').val();
                $.ajax({
                    type: "PUT",
                    url: "{{route('admin.orderarea.update',"+id+")}}",
                    data: $('#delete-orderarea').serialize(),
                    success: function (response) {
                        // console.log(response);
                        location.reload();
                    }
                });
            });
        });
        function deleteOrderArea(id) {
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
    console.log(id);
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
