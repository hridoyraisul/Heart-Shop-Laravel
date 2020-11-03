<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}">
    <!-- MAIN CSS-->
    <link rel="stylesheet" href="{{asset('/frontend/css/main.css')}}">
    <!--my responsive-->
    <link rel="stylesheet" href="{{asset('/frontend/css/responsive.css')}}">
    <!--- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/meanmenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/nice-select.css')}}">
    <!--- awl carousel -->
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/owl.carousel.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
<!-- Header Area -->
<div class="header-section">
    <div class="container position-relative">
        <div class="row">
            <div class="col-xl-5 col-md-12 my-xl-5 mb-0 my-sm-3  position-static ">
                <div class="main-menu d-none d-md-block">
                    <nav>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="#">Category <i class="fas fa-angle-down"></i></a>
                                <ul class="submenu">

									@foreach($allCategory as $cat)
                                                <li><a href="{{url('/shop-view/category/'.$cat->category_name)}}">{{$cat->category_name}}</a></li>
                                            @endforeach

                                    </li>

                                </ul>
                            </li>
                            <li><a href="{{url('/shop-view/')}}">Shop</a></li>
                            <li><a href="#">Videos</a>
                                <div class="mega-menu">
                                    <ul>
                                        <li class="mega-title"><a href="#">Fashion Tips</a></li>
                                        <li><a href="https://youtu.be/gp-P7V18pGk">buy perfect PANJABI</a></li>
                                        <li><a href="https://youtu.be/n_fX2Tlk6QI">buy perfect LOAFER</a></li>
                                        <li><a href="https://youtu.be/j3Xkmji7KdY">buy PERFECT BLAZER & SPORTS COAT</a></li>
                                        <li><a href="https://youtu.be/lTpmnL4L89M"> buy PERFECT formal shoes</a></li>
                                    </ul>

                                </div>
                            </li>

                        </ul>
                    </nav>
                </div>
                <div class="mobile-menu d-md-none">
                    <nav id="mobile-menu-active">
                        <ul>
                            <li><a href="#">Home <i class="fas fa-angle-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="#">Submenu item 1</a></li>
                                    <li><a href="#">Submenu item 1</a></li>
                                    <li><a href="#">Submenu item 1</a></li>
                                    <li><a href="#">Submenu item 1</a></li>
                                    <li><a href="#">Submenu item 1</a>
                                        <ul class="submenu">
                                            <li><a href="#">Submenu item 1</a></li>
                                            <li><a href="#">Submenu item 1</a></li>
                                            <li><a href="#">Submenu item 1</a></li>
                                            <li><a href="#">Submenu item 1</a></li>
                                            <li><a href="#">Submenu item 1</a>
                                                <ul class="submenu">
                                                    <li><a href="#">Submenu item 1</a></li>
                                                    <li><a href="#">Submenu item 1</a></li>
                                                    <li><a href="#">Submenu item 1</a></li>
                                                    <li><a href="#">Submenu item 1</a></li>
                                                    <li><a href="#">Submenu item 1</a> </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Blogs</a>
                                <ul class="mega-menu">
                                    <li class="mega-title"><a href="#">Mega menu Tilte</a></li>
                                    <li><a href="#">Mega menu Item</a></li>
                                    <li><a href="#">Mega menu Item</a></li>
                                    <li><a href="#">Mega menu Item</a></li>
                                    <li><a href="#">Mega menu Item</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Submenu item 1</a> </li>
                            <li><a href="#">Submenu item 1</a> </li>
                            <li><a href="#">Submenu item 1</a> </li>
                            <li><a href="#">Submenu item 1</a> </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-12 text-center mb-0  my-xl-5 ">
                <div class="">
                    <a href="{{url('/')}}" class="text-center"><img width="350" height="130" src="{{asset('/frontend/img/heartshop.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-xl-5 col-md-8 col-sm-12 mb-0  my-xl-5 text-center text-md-right position-relative">
                <div class="header-right">
                    <ul>
                        @if(Session::get('customer_id'))
                            <li><a href="{{url('/customer/logout')}}">Logout</a></li>
                        @else
                            <li><a href="{{url('/customer/login-form')}}">Login</a></li>
                            @endif
{{-- .......................wishList shortcut icon...................................--}}
                        <!-- <li><a href="#"><i class="fas fa-heart"></i> ({{$wishListCount}})</a></li> -->
{{-- ...........................cart shortcut icon...................................--}}
                        <li><a href="#">cart({{$totalQuantity}})</a>
                            <div class="card-hover p-3">
                                <table class="table table-dark table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="h-100">Photo</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cartContent as $cart)
                                    <tr>
                                        <td> <img style="width:100%;height:65px" src="{{asset('uploads/product_image/'.$cart->attributes->product_image)}}"  alt=""></td>
                                        <td><p>{{$cart->name}}</p></td>
                                        <td>৳ {{$cart->price}}<br>
                                            Total: ৳ {{$cart->price * $cart->quantity}}
                                        </td>
                                        <td  class="position-relative">
                                            <a class="d-inline position-absolute" href="{{url('/cart/remove/'.$cart->id)}}" style="top:-23px;right:13px;"><i class="fas fa-trash-alt text-danger"></i></a>
                                            <form action="{{url('/cart/update/')}}" method="post" class="mt-4">
                                                @csrf
                                                <div class="form-group">
                                                    <input class="w-100 form-control" type="Number" value="{{$cart->quantity}}" min="1" name="product_quantity">
                                                    <input class="w-100" type="hidden" value="{{$cart->id}}" name="product_id">
                                                    <label for="my-input">
                                                        <button type="submit" class="btn btn-outline-light mt-1">Update</button>
                                                    </label>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="total-price clearfix">
                                    <span class="float-left total-left">Total Price :</span>
                                    <span class="float-right total-right">৳ {{$subTotal}}</span>
                                    {{Session::put(['totalPrice'=>$subTotal])}}
                                </div>
                                @if(Session::get('customer_id'))
                                    <a href="{{url('/product/shipping')}}" class="check-out-botton">Check Out</a>
                                @else
                                    <a href="{{url('/customer/login-form')}}" class="check-out-botton">Check Out</a>
                                    @endif
                            </div>
                        </li>
                        <li><a href="#"><i class="fas fa-search"></i></a>
                            <div class="search-box">
                                <form action="{{url('/search/')}}" method="POST" role="search">
                                    @csrf
                                    <input type="text" placeholder="Search" name="searchProduct" id="searchProduct">
                                    <button><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('content')
<!--Footer-section start-->
    <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Heart Shop 2020</span><br>
        </div>
    </div>
</footer>
<!--Footer-section End-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('/frontend/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('/frontend/js/popper.min.js')}}"></script>
<script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.meanmenu.min.js')}}"></script>
<script src="{{asset('/frontend/js/slick.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.nice-select.min.js')}}"></script>
<!-- My Js-->
<script src="{{asset('/frontend/js/main.js/')}}"></script>

<!-- Search functionality - AJAX code -->


<script type="text/javascript">
$.ajaxSetup({ headers: {'csrftoken' : '@csrf' }});
</script>

</body>
</html>

