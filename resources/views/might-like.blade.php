<div class="col-md-5 col-lg-7 col-xl-12 order-md-0 p-10 m-10 text-black">
    <div class="content content-full">
        <div class="block block-rounded">
            <div class="block-content">
                <div id="side-content" class="d-none d-md-block push">
                    <h4 class="might-like m-10">You might also like</h4>
                    <div class="row text-black">
                        @foreach($mightAlsoLike as $product)
                        <div class="text-center m-10 p-1">
                            <a href="{{route('shop.show', $product->slug)}}" class="text-black">
                                <img src="{{ asset('pictures/Shop/'.$product->slug.'.jpg')}}" style="width:220px"
                                    alt="">
                                <a href="{{route('shop.show', $product->slug)}}"
                                    class="nav-link text-black hover:text-black">
                                    <div class="text-1xl">{{ $product->name }}</div>
                                </a>
                                <strong>{{ $product->presentPrice() }}</strong>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>