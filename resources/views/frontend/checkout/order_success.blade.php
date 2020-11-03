@extends('layouts.frontend_master')
@section('title')
    Order Confirmed
@endsection
@section('content')
    <!-- Page Title area start -->
    <div class="page-tile-area py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/shop-view/')}}">View Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order confirmed</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title area start -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header  mb-3 text-center text-info">
                        Dear <strong>{{Session::get('customer_name')}}</strong> your order is confirmed successfully. The product is being processed for the shipment.
                    </div>
                    <div class="card-body text-lg-center">
                        <img src="frontend\product-delivery-hero.webp" height="190px">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
