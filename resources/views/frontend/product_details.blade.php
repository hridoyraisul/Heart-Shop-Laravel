@extends('layouts.frontend_master')
@section('title')
    {{$product->product_name}} | Heart Shop
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
                            <li class="breadcrumb-item active" aria-current="page">{{$product->product_category}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title area End -->
    <!-- product details start -->
    <div class="product-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="img-tab-area">
                        <div class="tab-content tab-img">
                            <div class="tab-pane fade show active" id="img1" role="tabpane">
                                <img class="img-fluid" src="{{asset('uploads/product_image/'.$product->product_image)}}" alt="">
                            </div>
                            <div class="tab-pane fade" id="img2" role="tabpanel">
                                <img class="img-fluid" src="{{asset('uploads/product_image/'.$product->product_image)}}" alt="">
                            </div>
                            <div class="tab-pane fade" id="img3" role="tabpanel">
                                <img class="img-fluid" src="{{asset('uploads/product_image/'.$product->product_image)}}" alt="">
                            </div>
                        </div>
                        <ul class="nav" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#img1" role="tab">
                                    <img class="img-fluid" src="{{asset('uploads/product_image/'.$product->product_image)}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#img2" role="tab">
                                    <img class="img-fluid" src="{{asset('uploads/product_image/'.$product->product_image)}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#img3" role="tab">
                                    <img class="img-fluid" src="{{asset('uploads/product_image/'.$product->product_image)}}" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- product-details -->
                    <div class="product-details">
                        <h2>{{$product->product_name}}</h2>
{{--                        <div class="rating-pro">--}}
{{--                            <i class="fas far fa-star"></i>--}}
{{--                            <i class="fas far fa-star"></i>--}}
{{--                            <i class="fas far fa-star"></i>--}}
{{--                            <i class="fas far fa-star"></i>--}}
{{--                            <i class="fas far fa-star"></i>--}}
{{--                            <span>3 Reating(s) | Add Your Reating(s)</span>--}}
{{--                        </div>--}}
                        <p>{{$product->Product_short_description}}</p>
                        @if($product->product_quantity === 1)
                        <p>(only {{$product->product_quantity}} piece available)</p>
                        @else
                            <p>( {{$product->product_quantity}} pieces available)</p>
                            @endif
                        <div class="price-pro">
                            <span>৳ {{$product->product_price}}</span>
                        </div>
                        <hr>
                    </div>
                    <!-- product-details End -->
                    <!-- options-area start -->
                    <div class="options-area">
{{--                        <div class="title">--}}
{{--                            <h3>Options</h3>--}}
{{--                        </div>--}}
{{--                        <form action="#">--}}
{{--                            <label for="">Size <span>*</span></label>--}}
{{--                            <select name="" id="">--}}
{{--                                <option value="#">- Please select - </option>--}}
{{--                                <option value="1">option 1</option>--}}
{{--                                <option value="1">option 2</option>--}}
{{--                                <option value="1">option 3</option>--}}
{{--                                <option value="1">option 4</option>--}}
{{--                                <option value="1">option 5</option>--}}
{{--                            </select>--}}
{{--                            <label for="">color <span>*</span></label>--}}
{{--                            <select name="" id="">--}}
{{--                                <option value="#">- Please select - </option>--}}
{{--                                <option value="1">option 1</option>--}}
{{--                                <option value="1">option 2</option>--}}
{{--                                <option value="1">option 3</option>--}}
{{--                                <option value="1">option 4</option>--}}
{{--                                <option value="1">option 5</option>--}}
{{--                            </select>--}}
{{--                            <span class="required">Repuired Fiields *</span>--}}
{{--                        </form>--}}
{{--                        Add to cart form --}}
                        <form action="{{url('/cart/add')}}" method="POST" class="cart-and-action">
                            @csrf
                            <div class="quanty clearfix md-7">
                                <label class="float-left md-3">Quantity :  </label>
                                <div class="float-left">
                                    <input type="number" name="product_quantity" class="form-control" min="1" value="1">
                                </div>
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                            </div>
                            <div class="cart-pro">
                                <br><button type="submit" class="btn btn-outline-dark btn-lg">Add to cart</button>&nbsp;&nbsp;
                            </div>
                        </form>

                    </div>
                    <!-- options-area End -->
{{--                    add to wishlist form--}}
                    <!-- <div class="cart-and-action clearfix">
                        <div class="product-action-pro">
                            <form action="{{url('/wishlist-add')}}" method="POST" class="cart-and-action">
                                @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="customer_id" value="{{Session('customer_id')}}">
                                <div class="cart-pro">
                                    <button type="submit" class="btn btn-outline-dark btn-lg">Add to wishlist</button>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    @if (session('flash_message'))
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <strong>Oops! </strong>{{session('flash_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('flash_message_success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <strong>Great! </strong>{{session('flash_message_success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
{{--                    <div class="share-icon">--}}
{{--                        <img src="{{asset('/frontend/img/social-icon.jpg')}}" alt="">--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- product info start -->
    <div class="product-info-area pt-5">
        <div class="container">
            <ul class="nav " role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                </li>
            </ul>
            <div class="tab-content pt-4">
                <div class="tab-pane fade show active" id="description" role="tabpanel">
                    <p>{!!$product->Product_long_description!!}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- product info end -->
    <!-- related-product-area start -->
    <div class="related-product-area mb-5">
        <div class="container">
            <div class="related-product pt-5 mt-5">
                <h3>Related Products</h3>
                <!--owl-carousel start-->
                <div class="product-active owl-carousel nav-style">
                    <!--Single product start-->
                    @foreach($relatedProduct as $prod)
                        @if($prod->id!=$product->id)
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="{{url('/product-details/'.$prod->id)}}"> <img src="{{asset('uploads/product_image/'.$prod->product_image)}}" alt=""></a>
                            <a href="{{url('/product-details/'.$prod->id)}}"> <img class="secondary-img" src="{{asset('frontend/img/product-img/product1.jpg')}}" alt=""></a>
                            <span>Hot</span>
                            <div class="product-action">
                                <a href="{{url('/product-details/'.$prod->id)}}"><i class="far fa-eye"></i></a>
                                <a href="#"><i class="fas fa-balance-scale"></i></a>
                                <a class="button" href="#"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content text-center"><br>
                            <h3><a href="{{url('/product-details/'.$prod->id)}}">{{$prod->product_name}}</a></h3>
                            <div class="rating">
                                <i class="fas far fa-star"></i>
                                <i class="fas far fa-star"></i>
                                <i class="fas far fa-star"></i>
                                <i class="fas far fa-star"></i>
                                <i class="fas far fa-star"></i>
                            </div>
                            <div class="price">
                                <span>৳ {{$prod->product_price}} </span>
                            </div>
                            <div class="cart-btn">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                    <!--Single product End-->
                </div>
                <!--owl-carousel end-->
            </div>
        </div>
    </div>
    <!-- related-product-area end -->
    <!-- found other products area start -->
    <div class="related-product-area">
        <div class="container">
            <div class="related-product  ">
                <h3>Recommended Products</h3>
                <!--owl-carousel start-->
                <div class="product-active owl-carousel nav-style">
                    <!--Single product start-->
                    @foreach($latestProduct as $lp)
                        @if($lp->id!=$product->id)
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="{{url('/product-details/'.$lp->id)}}"> <img src="{{asset('uploads/product_image/'.$lp->product_image)}}" alt=""></a>
                            <a href="{{url('/product-details/'.$lp->id)}}"> <img class="secondary-img" src="{{asset('frontend/img/product-img/product1.jpg')}}" alt=""></a>
                            <span>Hot</span>
                            <div class="product-action">
                                <a href="#"><i class="far fa-eye"></i></a>
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
                            </div>
                            <div class="cart-btn">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                    <!--Single product End-->
                </div>
                <!--owl-carousel end-->
            </div>
        </div>
    </div>
    @endsection
