@extends('layouts.frontend_master')
@section('title')
    Shop view
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
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title area start -->
    <div class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- widget with Number start -->
                    <div class="widget-area ">
                        @include('frontend.includes.shop_widget')
                    </div>
                    <!-- widget Number End  -->

                </div> <!-- Col-3  end-->
                <div class="col-lg-9">
                    <!-- Banner area start  -->
                    <div class="banner-area">
                        <img src="{{asset('frontend/img/banner-img/banner2.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <!-- Banner area  End-->
                    <!-- List view and grid view tab start-->
                    <div class="shop-layout-area py-5">
                        <div class="shop-layout-bar clearfix ">
                            <ul class="nav shop-tap" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#grid-view" role="tab">
                                        <i class="fas fa-th-large"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#list-view" role="tab">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </li>
                            </ul>
                        
                            @if($allProduct == NULL)
                            <div class="showing-result">
                                
                            </div>
                            @else
                            <div class="showing-result">
                                <span>Showing {{count($allProduct)}} results</span>
                            </div>
                            @endif

                        </div>

                        <!-- tab content-->
                        <div class="tab-content pt-4">
                            <!-- tab grid content-->
                            <div class="tab-pane fade active show" id="grid-view" role="tabpanel">
                                <div class="row">
                                    @if($allProduct == NULL)

                                        <div class="alert alert-dark w-100 alert-dismissible" role="alert">
                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Woops!    </strong> &nbsp Sorry No Data Found. &nbsp&nbsp&nbsp
                                        </div>
                                        @endif
                                        @if(!empty($allProduct) && count($allProduct) > 0) 
                                    <!--Single product start-->
                                    @foreach($allProduct as $alp)
                                    <div class="col-md-4">
                                        <!--Single product start-->
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="{{url('/product-details/'.$alp->id)}}"> <img src="{{asset('uploads/product_image/'.$alp->product_image)}}" alt=""></a>
                                                <a href="{{url('/product-details/'.$alp->id)}}"> <img class="secondary-img"
                                                                  src="{{asset('frontend/img/product-img/product1.jpg')}}" alt=""></a>
                                                <span>hot</span>
                                                <div class="product-action">
                                                    <a href="{{url('/product-details/'.$alp->id)}}"><i class="far fa-eye"></i></a>
                                                    <a href="#"><i class="fas fa-balance-scale"></i></a>
                                                    <a href="#"><i class="fas fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content text-center">
                                                <h3><a href="{{url('/product-details/'.$alp->id)}}">{{$alp->product_name}}</a></h3>
                                                <div class="rating">
                                                    <i class="fas far fa-star"></i>
                                                    <i class="fas far fa-star"></i>
                                                    <i class="fas far fa-star"></i>
                                                    <i class="fas far fa-star"></i>
                                                    <i class="fas far fa-star"></i>
                                                </div>
                                                <div class="price">
                                                    <span>৳ {{$alp->product_price}}</span>
                                                    <span><del>$239.9</del></span>
                                                </div>
                                                <div class="cart-btn">
                                                    <form action="{{url('/cart/add')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_quantity" value="1">
                                                        <input type="hidden" name="product_id" value="{{$alp->id}}">
                                                        <button type="submit" class="btn btn-outline-dark btn-lg">Add to cart</button>
                                                    </form>
                                                </div>
{{--                                                <div class="cart-pro">--}}
{{--                                                    <form action="{{url('/cart/add')}}" method="POST">--}}
{{--                                                        @csrf--}}
{{--                                                        <input type="hidden" name="product_quantity" value="1">--}}
{{--                                                        <input type="hidden" name="product_id" value="{{$alp->id}}">--}}
{{--                                                        <div class="cart-btn">--}}
{{--                                                        <button type="submit" class="btn btn-outline-dark btn-sm">Add to cart</button>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <!--Single product End-->
                                    </div>
                                        @endforeach
                                    <!--Single product End-->
                                    {{$allProduct->links()}}
                                    @endif
                                </div>
                            </div>
                            <!-- tab list content-->
                            <div class="tab-pane fade" id="list-view" role="tabpanel">
                                <!--Single product start-->
                                @if(!empty($allProduct) && count($allProduct) > 0)
                                @foreach($allProduct as $alp)
                                <div class="row pb-4">
                                    <div class="col-md-4">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="{{url('/product-details/'.$alp->id)}}"> <img src="{{asset('uploads/product_image/'.$alp->product_image)}}" alt=""></a>
                                                <a href="{{url('/product-details/'.$alp->id)}}"> <img class="secondary-img"
                                                                  src="{{asset('frontend/img/product-img/product1.jpg')}}" alt=""></a>
                                                <span>hot</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="product-content-list">
                                            <h3><a href="{{url('/product-details/'.$alp->id)}}">{{$alp->product_name}}</a></h3>
                                            <p>{{$alp->Product_short_description}}</p>
                                            <div class="rating-list">
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <span>3 Reating(s) | Add Your Reating(s)</span>
                                            </div>
                                            <div class="price-list">
                                                <span>৳ {{$alp->product_price}}</span>
                                            </div>
                                            <div class="cart-and-action">
                                                <div class="cart-btn-list">
                                                        <form action="{{url('/cart/add')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_quantity" value="1">
                                                            <input type="hidden" name="product_id" value="{{$alp->id}}">
                                                                <button type="submit" class="btn btn-outline-dark btn-sm">Add to cart</button>
                                                        </form>
                                                </div>
                                                <div class="product-action-list">
                                                    <a href="{{url('/product-details/'.$alp->id)}}"><i class="far fa-eye"></i></a>
                                                    <a href="#"><i class="fas fa-balance-scale"></i></a>
                                                    <a href="#"><i class="fas fa-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--Single product End-->
                                {{$allProduct->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- List view and grid view tab End-->
                </div>
            </div>
        </div>
    </div>
    @endsection
