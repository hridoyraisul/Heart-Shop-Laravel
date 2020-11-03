@extends('layouts.frontend_master')
@section('title')
    Heart Shop
    @endsection
@section('content')
<!-- Carosel Area start-->
<section class="carousel-section pb-5">
    <div class="container">
        <div class="slider-active">
            <div class="slider-single-item">
                <img src="{{asset('/frontend/img/slider-img1.jpg')}}" class="img-fluid" alt="no image">
                <div class="slider-text">
{{--                    <h2>Cherner <span>Armchair</span></h2>--}}
{{--                    <p>The 1958 moulded plywood armchair by Norman Cherner.</p>--}}
{{--                    <a href="#">View now</a>--}}
                </div>
            </div>
            <div class="slider-single-item">
                <img src="{{asset('/frontend/img/slider-img2.jpg')}}"  class="img-fluid" alt="">
                <div class="slider-text">
{{--                    <h2>Cherner <span>Armchair</span></h2>--}}
{{--                    <p>The 1958 moulded plywood armchair by Norman Cherner.</p>--}}
{{--                    <a href="#">View now</a>--}}
                </div>
            </div>
            <div class="slider-single-item">
                <img src="{{asset('/frontend/img/slider-img3.jpg')}}" class="img-fluid" alt="">
                <div class="slider-text">
{{--                    <h2>Cherner <span>Armchair</span></h2>--}}
{{--                    <p>The 1958 moulded plywood armchair by Norman Cherner.</p>--}}
{{--                    <a href="#">View now</a>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Carosel Area end-->
{{--................................................................................................................--}}
<!-- Latest product area Start-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12"><h3>Latest Product</h3></div>
        </div>
        <div class="row">
            <!--Single product Start-->
            @forelse($latestProduct as $lp)
            <div class="col-md-3">
                <!--Single product start-->
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="{{url('/product-details/'.$lp->id)}}"> <img src="{{asset('uploads/product_image/'.$lp->product_image)}}" alt=""></a>
                        <a href="{{url('/product-details/'.$lp->id)}}"> <img class="secondary-img" src="{{asset('/frontend/img/product-img/product1.jpg')}}"
                                          alt=""></a>
                        <span>hot</span>
                        <div class="product-action">
                            <a href="{{url('/product-details/'.$lp->id)}}"><i class="far fa-eye"></i></a>
                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="{{url('/product-details/'.$lp->id)}}">{{$lp->product_name}}</a></h3>
                        <div class="rating">
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                        </div>
                        <div class="price">
                            <span>৳ {{$lp->product_price}}</span>
                            <span><del>$239.9</del></span>
                        </div>
                        <div class="cart-btn">
                            <form action="{{url('/cart/add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_id" value="{{$lp->id}}">
                                <button type="submit" class="btn btn-outline-dark btn-lg">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                @empty
                <div class="alert alert-dark w-100">
                    Sorry, no data is available, checkout later
                </div>
                @endforelse
        <!--Single product End-->
        </div>
    </div>
</section>
<!-- Latest product area End-->
<!--Product Area category wise Start-->
<section class="product-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="product-tab cat_product">
                    <ul class="nav" role="tablist">
                        <li class="nav-item  pb-5">
                        <li class="nav-item  pb-5">
                            <a class="nav-link active" data-toggle="tab" href="#all" role="tab">All</a>
                        @foreach($allCategory as $cat)
                        <li class="nav-item  pb-5">
                            <a class="nav-link" data-toggle="tab" href="#{{$cat->category_name}}" role="tab">{{$cat->category_name}}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        <!--Tab start-->
                        <div class="tab-pane fade show active" id="all" role="tabpanel">
                            <!--owl-carousel start-->
                            <div class="product-active owl-carousel nav-style">
                                <!--Single product start-->
                                @forelse($allProduct as $alp)
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="{{url('/product-details/'.$alp->id)}}"> <img src="{{asset('uploads/product_image/'.$alp->product_image)}}" alt=""></a>
                                        <a href="{{url('/product-details/'.$alp->id)}}"> <img class="secondary-img" src="{{asset('frontend/img/product-img/product1.jpg')}}"
                                                          alt=""></a>
                                        <span>Hot</span>
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
                                    </div>
                                </div>
                                @empty
                                    <div class="alert alert-dark w-100">
                                    Sorry, no data is available, checkout later
                                    </div>
                                @endforelse
                                <!--Single product End-->
                            </div>
                            <!--owl-carousel end-->
                        </div>
                        <!--Tab end-->
                        <!--Tab start-->
                        @foreach($allCategory as $cat)
                        <div class="tab-pane fade" id="{{$cat->category_name}}" role="tabpanel">
                            <!--owl-carousel start-->
                            <div class="product-active owl-carousel nav-style">
                                <!--Single product start-->
                                @foreach($allProduct as $alp)
                                    @if($cat->category_name == $alp->product_category)
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="{{url('/product-details/'.$alp->id)}}"> <img src="{{asset('uploads/product_image/'.$alp->product_image)}}" alt=""></a>
                                        <a href="{{url('/product-details/'.$alp->id)}}"> <img class="secondary-img" src="{{asset('frontend/img/product-img/product1.jpg')}}"
                                                          alt=""></a>
                                        <span>Hot</span>
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
                                    </div>
                                </div>
                                    @endif
                                @endforeach
                                <!--Single product End-->
                            </div>
                            <!--owl-carousel end-->
                        </div>
                        @endforeach
                        <!--Tab end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Product Area category wise End-->
<!--Banner Area-->
<div class="banner-area pb-5">
    <div class="container">
        <div class="banner-img">
            <a href="#"><img class="img-fluid" src="{{asset('frontend/img/banner-img/banner.jpg')}}" alt=""></a>
        </div>
    </div>
</div>
<!--Product Area-->
<!--Brand-section End-->
@endsection
