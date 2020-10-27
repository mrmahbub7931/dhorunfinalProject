@extends('layouts.back-end.app')

@section('title','Products')

@push('css')
    {{-- none --}}
@endpush

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Product List
                        <small>Dhorun.com</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item active">Product List</li>
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
                    <h5>Products</h5>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif
                    <div class="btn-popup pull-right">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Type</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($products as $key => $product)
                                
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                <td> <img src="{{$product->featured_image}}" alt="" style="width: 60px"; height="60px"> </td>
                                    <td> {{ $product->name }} </td>
                                    <td>{{ $product->type }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->price }}TK.</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fa fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="">View</a>
                                            <a class="dropdown-item" href="">Edit</a>

                                            <a class="dropdown-item" href="{{route('products.destroy',$product->slug)}}" onclick="event.preventDefault();document.getElementById('delete-form-{{$product->slug}}').submit();">Delete</a>

                                            <form id="delete-form-{{$product->slug}}" action="{{route('products.destroy',$product->slug)}}" method="POST" style="display: none">
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
<script type="text/javascript">
    function deleteProduct(slug) {
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
document.getElementById('delete-form-'+slug).submit();
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