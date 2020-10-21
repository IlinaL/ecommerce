@extends('layouts.app')

@section('content')

@section('title', 'Home')

<div id="carouselExampleCaptions" class="carousel slide " style="position:relative" data-ride="carousel"><!-- Slider -->
    <ol class="carousel-indicators" style="">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    </ol>

    <div class="carousel-inner"> <!--Sliders -->
    
        <div class="carousel-item active"> <!-- Create your account  -->
            <img src="pictures/Slider/slider4.jpg" class="d-block w-100" alt="" style="width:100%">
            <div class="carousel-caption d-none d-md-block">
                <h5>Monohoo</h5>
                <p>Create your account</p>
                <a href="{{ route('register') }}" class="btn btn-lg btn-outline-success">REGISTER</a>
            </div>
        </div> <!-- END create your account -->

        <div class="carousel-item"> <!-- Shop now -->
            <img src="pictures/Slider/slider5.jpg" class="d-block w-100" alt="" style="width:100%">
            <div class="carousel-caption d-none d-md-block">
                <h5>Autumn</h5>
                <p>It's finally here</p>
                <a href="{{route('shop.index')}}" class="btn btn-lg btn-outline-danger">SHOP NOW</a>
            </div>
        </div> <!-- END Shop now -->

    </div> <!-- END Sliders -->
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> <!-- END Slider -->

<div class="col-md-8 col-lg-7 col-xl-12 order-md-0 "> <!-- Monohoo Shopping -->
    <div class="content content-full">
        <div class="block block-rounded">
            <div class="block-content">
                <h5 class="header-text mt-10 text-center">Monohoo Shopping</h5>

                <div id="side-content" class="d-none d-md-block push m-20 p-4"> <!-- Featured -->
                    <div class="row ml-12 ">
                        @foreach ($products as $product)
                        <div class="product text-center ml-12 p-2">
                            <a href="{{route('shop.show', $product->slug)}}"><img
                                    src="{{ asset('pictures/Shop/'.$product->slug.'.jpg')}}" style="width:210px"
                                    alt="product"></a>
                            <a href="{{route('shop.show', $product->slug)}}"
                                class="nav-link text-black hover:text-black">
                                <div class="text-1xl">{{ $product->name }}</div>
                            </a>
                            <strong>{{ $product->presentPrice() }}</strong>
                        </div>
                        @endforeach
                    </div>
                    <div class=" cart-buttons text-center button-container p-5">
                        <a href="{{ route('shop.index') }}" class="mx-auto">View more products</a>
                    </div>
                </div> <!-- END Featured -->
            </div>
        </div>
    </div>
</div> <!-- END Monohoo Shopping -->
</div>
</head>
</body>
@endsection