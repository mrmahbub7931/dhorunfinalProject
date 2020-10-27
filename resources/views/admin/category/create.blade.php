@extends('layouts.back-end.app')

@section('title','Create Category')

@push('css')

@endpush

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Create Category
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
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Add Category</h5>
                    </div>
                    <div class="card-body">
                    <form class="needs-validation category-add" novalidate="" action="{{ route('admin.category.store') }}" method="POST">
                            <h4>Category Details</h4>
                            @csrf
                            <div class="form-group row">
                                <label for="category_name" class="col-xl-3 col-md-4"><span>*</span> Category Name</label>
                                <input class="form-control col-xl-8 col-md-7" name="category_name" id="category_name" type="text" required="">
                            </div>
                            <div class="form-group row">
                                <label for="icon_class" class="col-xl-3 col-md-4"><span>*</span> Icon class name</label>
                                <input class="form-control col-xl-8 col-md-7" name="icon_class" id="icon_class" type="text" required="" placeholder="fa fa-user">
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-xl-3 col-md-4"><span>*</span> Description</label>
                                <textarea class="form-control col-xl-8 col-md-7" name="description" id="description" required=""></textarea>
                            </div>
                            
                            <div class="form-group row">
                                <label for="description" class="col-xl-3 col-md-4"><span>*</span> Select Parent Category</label>
                                <select name="parent_id" class="form-control col-xl-8 col-md-7">
                                    <option value="0">Select Category</option>
                                    @foreach ($categories as $category)
                                        @if ($category['parent_id'] === 0)
                                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label pt-0"> </label>
                                <label for="col-form-label pt-0" class="col-xl-3 col-md-4"><span></span> Category Image</label>
                                <input type="file" name="image" id="image" class="form-control col-xl-8 col-md-7">
                            </div>
                            <div class="pull-left">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@push('js')

@endpush