@extends('layouts.backend_master')
@section('title')
    Add Product
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
                        <h1 class="h3 mb-0 text-gray-800">Add New Product</h1>
                        <a class="btn btn-outline-primary" href="{{url('/admin')}}">Go to Dashboard</a>
                    </div>
                    @if(session('product_add_notify'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Great! </strong>{{session('product_add_notify')}}
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
                    <form action="{{route('store_product')}}" method="post" name="product_form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="product_name" value="{{old('product_name')}}" class="form-control" id="product_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_category" class="col-sm-2 col-form-label">Product Category</label>
                            <div class="col-sm-10">
                                <select name="product_category" class="form-control" id="product_category">
                                    <option disabled>--Select a Category--</option>
                                    @foreach($category as $row)
                                        <option>{{$row->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Product_short_description" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <textarea id="Product_short_description" class="form-control" name="Product_short_description" rows="2">{{old('Product_short_description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="summary-ckeditor" class="col-sm-2 col-form-label">Long Description</label>
                            <div class="col-sm-10">
                                <textarea id="summary-ckeditor" class="form-control" name="Product_long_description" rows="3">{{old('Product_long_description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
                            <div class="col-sm-10">
                                <input type="number" name="product_price" value="{{old('product_price')}}" class="form-control" id="product_price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_image" class="col-sm-2 col-form-label">Product Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="product_image" class="form-control" id="product_image">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Publication Status</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="publication_status" id="published" value="1">
                                        <label class="form-check-label" for="published">
                                            Published
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="publication_status" id="unpublished" value="0">
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
                                <button type="submit" class="btn btn-primary">Add Product</button>
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
    {{--    for retriving category name in the select box --}}
    <script>
        document.forms['product_form'].elements['product_category'].value = '{{old('product_category')}}';
    </script>
@endsection
