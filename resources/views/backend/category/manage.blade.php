@extends('layouts.backend_master')
@section('title')
    Manage Category
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
                        <h1 class="h3 mb-0 text-gray-800">Manage All Category</h1>
                        <a class="btn btn-outline-primary" href="{{url('/admin')}}">Go to Dashboard</a>
                    </div>
                    @if(session('publish_notify'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('publish_notify')}}
                        </div>
                    @endif
                    @if(session('unpublish_notify'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('unpublish_notify')}}
                        </div>
                    @endif
                    @if(session('delete_notify'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('delete_notify')}}
                        </div>
                    @endif
                    {{--  ..................................error message................................ --}}
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <table style="width:100%" class="table-bordered table-hover">
                        <tr align="center">
                            <th>ID No</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        @foreach($category as $cat)
                        <tr align="center">
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->category_name}}</td>
                            <td>{{$cat->category_description}}</td>
                            <td>{{$cat->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>{{$cat->created_at}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Button group">
                                <a href="{{URL::to('/admin/category/edit/'.$cat->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                <a href="{{URL::to('/admin/category/delete/'.$cat->id)}}" class="btn btn-sm btn-outline-danger">Delete</a>
                                @if($cat->publication_status == 1)
                                    <a href="{{URL::to('/admin/category/unpublish/'.$cat->id)}}" class="btn btn-outline-dark">Unpublish</a>
                                @else
                                    <a href="{{URL::to('/admin/category/publish/'.$cat->id)}}" class="btn btn-outline-primary">Publish</a>
                                @endif
                                </div>
                            </td>
                        </tr>
                            @endforeach
                    </table>
                    <div class="row-cols-sm-2">{{ $category->links() }}</div>
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
