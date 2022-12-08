@extends('layouts.home')

@section('title',$setting->title)

@section('description',$setting->description)

@section('keywords',$setting->keywords)

@section('author','Sedat İŞLEK')

@section('content')

    @include('home._slider')

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Deals Of The Day</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->

                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="{{asset('front/')}}/img/banner14.jpg" alt="">
                        <div class="banner-caption">
                            <h2 class="white-color">NEW<br>COLLECTION</h2>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- Product Slick -->
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">

                            <!-- Product Single -->
                            @foreach($dailys as $daily)
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            <span>New</span>
                                            <span class="sale">-20%</span>
                                        </div>
                                        <ul class="product-countdown">
                                            <li><span>00 H</span></li>
                                            <li><span>00 M</span></li>
                                            <li><span>00 S</span></li>
                                        </ul>
                                        <a href="{{route('product',['id' => $daily->id, 'slug' => $daily->slug])}}"
                                           class="main-btn quick-view">
                                            <i class="fa fa-search-plus"></i>
                                            Quick view
                                        </a>
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($daily->image)}}"
                                             height="435" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">{{$daily->price}}
                                            <del class="product-old-price">
                                                {{$daily->price * 1.2}}
                                            </del>
                                        </h3>
                                        @php
                                            $average = \App\Http\Controllers\HomeController::averageview($daily->id);
                                            $countreview = \App\Http\Controllers\HomeController::countreview($daily->id);
                                        @endphp
                                        <div class="product-rating">
                                            <i class="fa fa-star @if($average<1) -o empty @endif"></i>
                                            <i class="fa fa-star @if($average<2) -o empty @endif"></i>
                                            <i class="fa fa-star @if($average<3) -o empty @endif"></i>
                                            <i class="fa fa-star @if($average<4) -o empty @endif"></i>
                                            <i class="fa fa-star @if($average<5) -o empty @endif"></i>
                                            <i>{{ $countreview }}</i>
                                        </div>
                                        <h2 class="product-name"><a href="#">{{$daily->title}}</a></h2>
                                        <div class="product-btns">
                                            <button class="main-btn btn-sm icon-btn"><i class="fa fa-heart"></i>
                                            </button>
                                            <button class="main-btn btn-sm icon-btn"><i class="fa fa-exchange"></i>
                                            </button>
                                            <form action="{{route('user_shopcart_store',$daily->id)}}" method="post">
                                                @csrf
                                                <input name="quantity" type="hidden" value="1"/>
                                                <button type="submit"
                                                        class="main-btn primary-btn btn-block add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to Cart
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /Product Single -->

                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->

        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Latest Products</h2>
                    </div>
                </div>
                <!-- section title -->
                @foreach($lasts as $last)
                    <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <a href="{{route('product',['id' => $last->id, 'slug' => $last->slug])}}"></a><i
                                    class="fa fa-search-plus"></i> Quick view</button>
                                <img src="{{\Illuminate\Support\Facades\Storage::url($last->image)}}" height="250"
                                     alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">{{$last->price}}</h3>
                                @php
                                    $average = \App\Http\Controllers\HomeController::averageview($last->id);
                                    $countreview = \App\Http\Controllers\HomeController::countreview($last->id);
                                @endphp
                                <div class="product-rating">
                                    <i class="fa fa-star @if($average<1) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<2) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<3) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<4) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<5) -o empty @endif"></i>
                                    <i>{{ $countreview }}</i>
                                </div>
                                <h2 class="product-name"><a href="#">{{$last->title}}</a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <form action="{{route('user_shopcart_store',$last->id)}}" method="post">
                                        @csrf
                                        <input name="quantity" type="hidden" value="1"/>
                                        <button type="submit" class="main-btn primary-btn btn-block add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Single -->
                @endforeach

            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Picked For You</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                @foreach($pickeds as $picked)
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <a href="{{route('product',['id' => $picked->id, 'slug' => $picked->slug])}}"></a><i
                                    class="fa fa-search-plus"></i> Quick view</button>
                                <img src="{{\Illuminate\Support\Facades\Storage::url($picked->image)}}" height="250"
                                     alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">{{$picked->price}}</h3>
                                @php
                                    $average = \App\Http\Controllers\HomeController::averageview($picked->id);
                                    $countreview = \App\Http\Controllers\HomeController::countreview($picked->id);
                                @endphp
                                <div class="product-rating">
                                    <i class="fa fa-star @if($average<1) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<2) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<3) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<4) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<5) -o empty @endif"></i>
                                    <i>{{ $countreview }}</i>
                                </div>
                                <h2 class="product-name"><a href="#">{{$picked->title}}</a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <form action="{{route('user_shopcart_store',$picked->id)}}" method="post">
                                        @csrf
                                        <input name="quantity" type="hidden" value="1"/>
                                        <button type="submit" class="main-btn primary-btn btn-block add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- /Product Single -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@endsection
