@extends('layouts.backend_master')
@section('title')
    {{$customerinfo->first_name}}'s order
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
                    {{--  .....................................Body Elements.............................................................--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <h2 class="text-center" style="color: #e74a3b">Product ordered</h2>
                                <table class="table table-hover table-dark">
                                    <thead class="thead-light -align-center">
                                    <tr align="center">
                                        <th>SN.</th>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productinfo as $prod)
                                        <tr align="center">
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$prod->product_id}}</td>
                                            <td>{{$prod->product_name}}</td>
                                            <td>
                                                <img src="{{asset('uploads/product_image/'.$prod->product_image)}}" height="80" width="80" class="img-fluid">
                                            </td>
                                            <td>{{$prod->product_price}} TK.</td>
                                            <td>{{$prod->product_quantity}}</td>
                                            <td>{{$prod->product_price * $prod->product_quantity}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                    <div class="row">
                                        <div class="col-md-8 mx-auto mb-4">
                                            <h2 class="text-center" style="color: #e74a3b">Order Information</h2>
                                            <table class="table table-hover table-dark" >
                                                <tr>
                                                    <th>Order ID</th>
                                                    <td>{{$orderinfo->id}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>{{$orderinfo->total_price}} TK.</td>
                                                </tr>
                                                <tr>
                                                    <th>Order Status</th>
                                                    <td>{{$orderinfo->order_status}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Status</th>
                                                    <td>{{$orderinfo->payment_status}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Payment type</th>
                                                    <td>{{$orderinfo->payment_type}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Order Date</th>
                                                    <td>{{$orderinfo->created_at}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 mx-auto mb-4">
                                            <h2 class="text-center" style="color: #e74a3b">Product shipment set to</h2>
                                            <table class="table table-hover table-dark">
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{$shippinginfo->full_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{$shippinginfo->phone_number}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{$shippinginfo->email_address}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address </th>
                                                    <td>{{$shippinginfo->address}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 mx-auto mb-4">
                                            <h2 class="text-center" style="color: #e74a3b">About Customer</h2>
                                            <table class="table table-hover table-dark">
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <td>{{$customerinfo->first_name.' '.$customerinfo->last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{$customerinfo->phone_number}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{$customerinfo->email_address}}</td>
                                                </tr>
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
