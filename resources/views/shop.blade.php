@extends('layouts.app')

@section('content')

@section('title', 'Shop')

<div class="breadcrumb w-100"> <!-- Shop -->
    <div class="container p-3">
        <a href="/home" class="text-black hover:text-black">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shop</span>
        <hr>
    </div>

    <div class="container">
        <div class="row no-gutters">
            <div class="categories col-6 col-md-4 "> <!-- By Category -->
                <div class="by-category">
                    <h2 class="stylish-heading">By Category</h2>
                    <div class="categoies">
                        <ul>
                            @foreach($categories as $category)
                            <li class="{{ request()->category == $category->slug ? 'active' : ''}}"><a
                                    class="nav-link category text-black w-32"
                                    href="{{route('shop.index', ['category'=> $category->slug]) }}">{{$category->name}}</a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div> <!-- END By Category -->

            <div class="col-12 col-sm-6 col-md-8">
                <h1 class="stylish-heading">{{$categoryName}}</h1>

                <div class="price">  <!-- Price: Low & High -->
                    <select class="price" onchange="location = this.value;">
                        <option value="">Price:</option>
                        <option
                            value="{{ route('shop.index',['category'=> request()->category, 'sort' => 'low_high'])}}">
                            Low to High</option>
                        <option
                            value="{{route('shop.index',['category'=> request()->category, 'sort' => 'high_low'])}}">
                            High to Low</option>
                    </select>
                </div> <!-- END Price: Low & High -->

                <div class="row"> <!-- Products details -->
                    @forelse ($products as $product)
                    <div class="product text-center p-3 text-black">
                        <a href="{{route('shop.show', $product->slug)}}"><img
                                src="{{ asset('pictures/Shop/'.$product->slug.'.jpg')}}" style="width:220px"
                                alt="product"></a>
                        <a href="{{route('shop.show', $product->slug)}}" class="nav-link text-black hover:text-black">
                            <div class="text-1xl">{{ $product->name }}</div>
                        </a>
                        <strong>{{ $product->presentPrice() }}</strong>
                    </div>
                    @empty
                    <div>No items</div>
                    @endforelse
                </div> <!-- END Products details -->

                <div class="spacer"></div>
                {{ $products->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div> <!-- END Shop -->
</div>
@endsection