@extends('layouts.backend_master')
@section('title')
    Manage Deleted Product
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
                        <h1 class="h3 mb-0 text-gray-800">Manage Deleted Products</h1>
                        <a class="btn btn-outline-primary" href="{{url('/admin')}}">Go to Dashboard</a>
                    </div>
                    @if(session('restore_notify'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('restore_notify')}}
                        </div>
                    @endif
                    @if(session('permanentDelete_notify'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('permanentDelete_notify')}}
                        </div>
                    @endif
                    <strong>Deleted products:</strong>
                    <table style="width:100%" class="table-bordered table-hover">
                        <tr align="center">
                            <th>ID No</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Short Description</th>
                            <th>Product Photo</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($SoftDelProduct as $sdp)
                            <tr align="center">
                                <td>{{$sdp->id}}</td>
                                <td>{{$sdp->product_name}}</td>
                                <td>{{$sdp->product_price}}</td>
                                <td>{{$sdp->product_quantity}}</td>
                                <td>{{$sdp->product_category}}</td>
                                <td>{{$sdp->Product_short_description}}</td>
                                <td>
                                    <img src="{{asset('/uploads/product_image/'.$sdp->product_image)}}" height="80" width="80" class="img-fluid">
                                </td>
                                <td>{{$sdp->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group">
                                        <a href="{{URL::to('/admin/restore-product/'.$sdp->id)}}" class="btn btn-sm btn-outline-info">Restore Product</a>
                                        <a href="{{URL::to('/admin/remove-product/'.$sdp->id)}}" class="btn btn-sm btn-outline-danger">Permanently Delete</a>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                    </table>
                    <div class="row-cols-sm-2">{{ $SoftDelProduct->links() }}</div>
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
