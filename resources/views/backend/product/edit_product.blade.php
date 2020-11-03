@extends('layouts.backend_master')
@section('title')
    Edit Product
@endsection
@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
    @include('backend.includes.side_bar')
    <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Top Bar-->
            @include('backend.includes.top_bar')
            <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- body content -->
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update Product</h1>
                        <a class="btn btn-outline-primary" href="{{url('/admin')}}">Go to Dashboard</a>
                    </div>
                    @if(session('product_update_notify'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('product_update_notify')}}
                        </div>
                    @endif
                    {{--                    error message--}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- .................Form Start................ --}}
                    <form action="{{URL::to('/admin/product/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="product_name" class="form-control" id="product_name" value="{{$data->product_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_category" class="col-sm-2 col-form-label">Product Category</label>
                            <div class="col-sm-10">
                                <select name="product_category" class="form-control" id="product_category">
                                    <option disabled>--Select a Category--</option>
                                    @foreach($category as $row)
                                        <option @if($data->product_category == $row->category_name) selected @endif>{{$row->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Product_short_description" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <textarea id="Product_short_description" class="form-control" name="Product_short_description" rows="2">{{$data->Product_short_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="summary-ckeditor" class="col-sm-2 col-form-label">Long Description</label>
                            <div class="col-sm-10">
                                <textarea id="summary-ckeditor" class="form-control" name="Product_long_description" rows="3">{{$data->Product_long_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
                            <div class="col-sm-10">
                                <input type="number" name="product_price" class="form-control" id="product_price" value="{{$data->product_price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_quantity" class="col-sm-2 col-form-label">Product Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" name="product_quantity" class="form-control" id="product_quantity" value="{{$data->product_quantity}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_image" class="col-sm-2 col-form-label">Product Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="product_image" class="form-control" id="product_image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <img src="{{asset('/uploads/product_image/'.$data->product_image)}}" height="80" width="80" class="img-fluid">
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Publication Status</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="publication_status" id="published" value="1" @if(@$data->publication_status == "1") checked @endif>
                                        <label class="form-check-label" for="published">
                                            Published
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="publication_status" id="unpublished" value="0" @if(@$data->publication_status == "0") checked @endif>
                                        <label class="form-check-label" for="unpublished">
                                            Unpublished
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                    {{-- .................Form End................ --}}
                </div>
                <!-- end of container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
        @include('backend.includes.footer')
        <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
