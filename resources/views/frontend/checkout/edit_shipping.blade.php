@extends('layouts.frontend_master')
@section('title')
    Shipping information
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
                            <li class="breadcrumb-item active" aria-current="page">Shipping</li>
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
                        Dear <strong>{{Session::get('customer_name')}}</strong>   you have to give us product shipping info to complete your valuable order.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto mb-5 ">
                <div class="card">
                    <div class="card-header">
                        Update your given shipping information
                    </div>
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
                    <div class="card-body">
                        <form action="{{url('/shipping/update/'.$data->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input id="first_name" class="form-control" type="text" name="full_name" value="{{$data->full_name}}" placeholder="Enter Full Name" >
                            </div>
                            <div class="form-group">
                                <input id="email_address" class="form-control" type="text" name="email_address" value="{{$data->email_address}}" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <input id="phone_number" class="form-control" type="text" name="phone_number" value="{{$data->phone_number}}" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="address" id="address" cols="30"
                                          rows="2" placeholder="Enter Shipping address">{{$data->address}}</textarea>
                            </div>
                            <input class="btn btn-outline-dark btn-lg btn-block" type="submit" value="Update & process shipping">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
