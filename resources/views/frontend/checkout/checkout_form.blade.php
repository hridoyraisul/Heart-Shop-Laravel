@extends('layouts.frontend_master')
@section('title')
    Customer Login/Registration
@endsection
@section('content')
    <div class="container">
        @if(session('reg_notify'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Registration Done! </strong>{{session('reg_notify')}}
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
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Resister,</h4> if you aren't registered yet!
                    </div>
                    <div class="card-body">
                        <form action="{{url('/customer/register')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input id="first_name" class="form-control" type="text" name="first_name"
                                       value="{{old('first_name')}}" placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" class="form-control" type="text" name="last_name"
                                       value="{{old('last_name')}}" placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">
                                <label for="email_address">Email Address or Phone Number</label>
                                <input id="email_address" class="form-control" type="text" name="email_address"
                                       value="{{old('email_address')}}" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input id="phone_number" class="form-control" type="text" name="phone_number"
                                       value="{{old('phone_number')}}" placeholder="Enter Your Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password"
                                       value="{{old('password')}}" placeholder="Enter Your Password">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="address">Address</label>--}}
{{--                                <textarea class="form-control" name="address" id="address" cols="30"--}}
{{--                                          rows="2" placeholder="Enter Your full address ">{{old('address')}}</textarea>--}}
{{--                            </div>--}}
                            <input class="btn btn-outline-dark btn-lg btn-block" type="submit" value="Resister">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">--}}
{{--                        <ol>--}}
{{--                            @foreach ($errors->all() as $error)--}}

{{--                                <li>{{ $error }}</li>--}}
{{--                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                    <span aria-hidden="true">&times;</span>--}}
{{--                                </button>--}}

{{--                            @endforeach--}}
{{--                        </ol>--}}
{{--                    </div>--}}
{{--                @endif--}}
                @if (session('worng_message'))
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        {{session('worng_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header">
                        Already Registered? <h4>Login here!</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/customer/login')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input id="email_address" class="form-control" type="text" name="email_address"
                                       value="{{old('email_address')}}" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password"
                                       value="{{old('password')}}" placeholder="Enter Your Password">
                            </div>

                            <input class="btn btn-outline-dark btn-lg btn-block" type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
