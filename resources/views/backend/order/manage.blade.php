@extends('layouts.backend_master')
@section('title')
    Manage Customers Order
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
                    @if(session('delete_notify'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('delete_notify')}}
                        </div>
                    @endif
                    <!-- body content -->
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manage Customers Order</h1>
                        <a class="btn btn-outline-primary" href="{{url('/admin')}}">Go to Dashboard</a>
                    </div>
{{--  .....................................Body Elements.............................................................--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover table-bordered ">
                                    <thead class="thead-light">
                                    <tr align="center">
                                        <th>SN.</th>
                                        <th>Customer Name</th>
                                        <th>Total Price</th>
                                        <th>Order Date/Time</th>
                                        <th>Payment Type</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allOrder as $order)
                                    <tr align="center">
                                        <td>{{$loop->index+1}}</td>
                                        <td>
                                            {{$order->OrderRelCustomer->first_name.' '.$order->OrderRelCustomer->last_name}}
                                        </td>
                                        <td>{{$order->total_price}} TK.</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->payment_type}}</td>
                                        <td>{{$order->payment_status}}</td>
                                        <td>{{$order->order_status}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="{{url('/admin/order/details/'.$order->id)}}" title="view Order details"><i class="fas fa-info"></i></a>
                                                <a class="btn btn-success" href="{{url('/admin/order/invoice-view/'.$order->id)}}" title="view Order Invoice"><i class="fas fa-file-invoice"></i></a>
                                                <a class="btn btn-primary" href="{{url('/admin/order/invoice-download/'.$order->id)}}" title="Order Invoice Download"><i class="fas fa-file-download"></i></a>
                                                <a class="btn btn-danger" href="{{url('/admin/order/delete/'.$order->id)}}" title=" Order Delete"><i class="fas fa-trash-alt"></i></a>
                                                <a class="btn btn-warning" href="" title=" Order Edit"><i class="far fa-edit"></i></a>
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
