@extends('layouts.back-end.app')

@section('title','Products')

@push('css')
    <!--Summer Note CSS -->
    <link rel="stylesheet" href="{{asset('assets/back-end/plugins/summernote/summernote-bs4.css')}}">
@endpush

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Create Product
                        <small>Dhorun.com</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item active">Product Create</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
<div class="container-fluid">
    <script>
        function convertToSlug( str ) {
	
            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
            
            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm,'');
            
            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');	
            document.getElementById("slug").value= str;
            //return str;
        }
    </script>
    {{-- form start --}}
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    <div class="row product-adding">
        
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5>General</h5>
                </div>
                <div class="card-body">
                    <div class="digital-add needs-validation">
                        @csrf
                        <div class="form-group">
                            <label for="product_name" class="col-form-label pt-0"><span>*</span> Product Name</label>
                            <input class="form-control" id="product_name" name="product_name" type="text" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)">
                        </div>
                        
                        <div class="form-group">
                            <label for="slug" class="col-form-label pt-0"><span>*</span> Product Slug</label>
                            <input class="form-control" id="slug" name="slug" type="text">
                        </div>

                        <div class="form-group">
                            <label for="sku" class="col-form-label pt-0">SKU</label>
                            <input class="form-control" id="sku" name="sku" type="text">
                        </div>
                        
                        <div class="form-group">
                            <label for="stock" class="col-form-label pt-0"><span>*</span> Stock</label>
                            <input class="form-control" id="stock" name="stock" type="text">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label"><span>*</span> Categories</label>
                            <select class="custom-select" name="category_id">
                                <option value="">--Select--</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label"><span>*</span> Product Type</label>
                            <select class="custom-select" name="type">
                                <option value="">--Select--</option>
                                    <option value="simple">Simple</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="short_description">Sort Summary</label>
                            <textarea rows="5" cols="12" id="short_description" name="short_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label"><span>*</span> Product Price</label>
                            <input class="form-control" id="price" name="price" type="text">
                        </div>
                        <div class="form-group">
                            <label for="discount" class="col-form-label">Discount</label>
                            <input class="form-control" id="discount" name="discount" type="text">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><span>*</span> Status</label>
                            <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                <label class="d-block" for="status">
                                    <input class="radio_animated" id="status" type="radio" name="status">
                                    Published
                                </label>
                                <label class="d-block" for="status1">
                                    <input class="radio_animated" id="status1" type="radio" name="status">
                                    Draft
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label pt-0"> Featured Image Upload</label>
                            <input type="file" name="featured_image" id="featured_image" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label pt-0"> Gallery Image Upload</label>
                            <input type="file" name="gallery_image[]" id="gallery_image" class="form-control" multiple>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5>Add Description</h5>
                </div>
                <div class="card-body">
                    <div class="digital-add needs-validation">
                        <div class="form-group mb-0">
                            <textarea class="summernote" name="long_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unity" class="col-form-label pt-0">Product Unity</label>
                        <input type="text" name="unity" id="unity" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Meta Data</h5>
                </div>
                <div class="card-body">
                    <div class="digital-add needs-validation">
                        <div class="form-group">
                            <label for="meta_title" class="col-form-label pt-0"> Meta Title</label>
                            <input class="form-control" id="meta_title" name="meta_title" type="text">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="meta_desc">Meta Description</label>
                            <textarea rows="4" cols="12" name="meta_description"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <div class="product-buttons text-center">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="reset" class="btn btn-light">Discard</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>  {{-- end form --}}
</div>
<!-- Container-fluid Ends-->

@endsection

@push('js')
<!--dropzone js-->
<script type="text/javascript" src="{{asset('assets/back-end/js/dropzone/dropzone.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/back-end/js/dropzone/dropzone-script.js')}}"></script>

<!--ckeditor js-->

<!--Summernote init-->
<script src="{{asset('assets/back-end/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    jQuery(document).ready(function(){

        $('.summernote').summernote({
            height: 250,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
    });
</script>

@endpush