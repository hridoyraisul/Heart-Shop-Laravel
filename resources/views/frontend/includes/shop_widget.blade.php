<ul id="myUL">
    <!-- Title with underline-->
    <div class="main-title-with-underline pb-4 mt-0">
        <h4>categories</h4>
    </div>
    <!---  Furniture option-->
    <li>
        <div class="caret title caret-down">Items</div>
        <ul class="nested active">
            @foreach($allCategory as $cat)
            <li><a href="{{url('/shop-view/category/'.$cat->category_name)}}">{{$cat->category_name}}</a></li>
                @endforeach
        </ul>
    </li>

    <!-- Title with underline-->
    <div class="main-title-with-underline pb-4">
        <h4>Shop by Color</h4>
    </div>
    <!---  color options-->
    <li>
        <div class="caret title">View Colors</div>
        <ul class="nested active">
            <form action="{{url('/color-red/')}}" method="POST" role="search">
                @csrf
                <input type="text" placeholder="Search" name="searchColor" id="searchColor" value="red" hidden>
                <button class="btn btn-outline-danger">Red</button>
            </form>
            <form action="{{url('/color-green/')}}" method="POST" role="search">
                @csrf
                <input type="text" placeholder="Search" name="searchColor" id="searchColor" value="green" hidden>
                <button class="btn btn-outline-success">Green</button>
            </form>
            <form action="{{url('/color-white/')}}" method="POST" role="search">
                @csrf
                <input type="text" placeholder="Search" name="searchColor" id="searchColor" value="white" hidden>
                <button class="btn btn-outline-secondary">White</button>
            </form>
            <form action="{{url('/color-blue/')}}" method="POST" role="search">
                @csrf
                <input type="text" placeholder="Search" name="searchColor" id="searchColor" value="blue" hidden>
                <button class="btn btn-outline-primary">Blue</button>
            </form>
            <form action="{{url('/color-black/')}}" method="POST" role="search">
                @csrf
                <input type="text" placeholder="Search" name="searchColor" id="searchColor" value="black" hidden>
                <button class="btn btn-outline-dark">Black</button>
            </form>
            <form action="{{url('/color-yellow/')}}" method="POST" role="search">
                @csrf
                <input type="text" placeholder="Search" name="searchColor" id="searchColor" value="yellow" hidden>
                <button class="btn btn-outline-warning">Yellow</button>
            </form>
        </ul>
    </li>
    <!---  color options End-->
</ul>
