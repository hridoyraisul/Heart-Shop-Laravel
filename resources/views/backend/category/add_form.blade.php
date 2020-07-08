@extends('layouts.backend_master')
@section('title')
    Add Category
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
                        <h1 class="h3 mb-0 text-gray-800">Add New Category</h1>
                        <a class="btn btn-outline-primary" href="{{url('/admin')}}">Go to Dashboard</a>
                    </div>
                    @if(session('catgory_add_notify'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Great! </strong>{{session('catgory_add_notify')}}
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
                    <form action="{{route('store_category')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="category_name" value="{{old('category_name')}}" class="form-control" id="category_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="summary-ckeditor" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea id="summary-ckeditor" class="form-control" name="category_description" rows="3">{{old('category_description')}}</textarea>
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
                                <button type="submit" class="btn btn-primary">Add Category</button>
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
