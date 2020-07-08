@extends('layouts.frontend_master')
@section('title')
    Payment method
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header  mb-3 text-center text-info">
                        Dear <strong class="text-dark">{{Session::get('customer_name')}}</strong>  now select your suitable payment method
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto mb-5 ">
                <form action="{{url('/order-confirm')}}" method="POST">
                    @csrf
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Cash On Delivery
                            </th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="payment_type" checked  type="radio" value="Cash" id="forCash">
                                    <label class="form-check-label" for="forCash">
                                        Cash On Delivery
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>DBBL</th>

                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="payment_type" type="radio" value="DBBL" id="fordbbl">
                                    <label class="form-check-label" for="fordbbl">
                                        DBBL
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Bkash</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="payment_type"  type="radio" value="Bkash" id="forBkash">
                                    <label class="form-check-label" for="forBkash">
                                        Bkash
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><a class="btn btn-warning" href="{{url('/shipping/edit/'.Session::get('customer_id'))}}">Shipping Edit</a></td>
                            <td><input class="btn btn-success" type="submit" name="btn" value="Confirm Order"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
