@extends('layouts.home')

@section('title',$product->title)

@section('description',$product->description)

@section('keywords',$product->keywords)

@section('author','Sedat İŞLEK')

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li>{{\App\Http\Controllers\admin\CategoryController::getParentsTree($product->category, $product->category->title)}}></li>
                <li class="active">{{$product->title}}</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            <div class="product-view">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}" alt="">
                            </div>
                            @foreach($imageList as $list)
                            <div class="product-view">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($list->image)}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="product-view">
                            <div class="product-view">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}" alt="">
                            </div>
                            @foreach($imageList as $list)
                                <div class="product-view">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($list->image)}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <div class="product-label">
                                <span>New</span>
                                <span class="sale">-20%</span>
                            </div>
                            <h2 class="product-name">{{$product->title}}</h2>
                            <h3 class="product-price">{{$product->price}}
                                <del class="product-old-price">{{$product->price * 1.3}}</del>
                            </h3>
                            <div>
                                @php
                                    $average = \App\Http\Controllers\HomeController::averageview($product->id);
                                    $countreview = \App\Http\Controllers\HomeController::countreview($product->id);
                                @endphp
                                <div class="product-rating">
                                    <i class="fa fa-star @if($average<1) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<2) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<3) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<4) -o empty @endif"></i>
                                    <i class="fa fa-star @if($average<4) -o empty @endif"></i>
                                    <i>{{ $countreview }}</i>
                                </div>
                                <a href="#">3 {{ $countreview }} Review(s) / {{ $average }} / Add Review</a>
                            </div>
                            <p><strong>Availability:</strong> In Stock</p>
                            <p><strong>Brand:</strong> E-SHOP</p>
                            <p>{{$product->description}}</p>
                            <div class="product-options">
                                <ul class="size-option">
                                    <li><span class="text-uppercase">Size:</span></li>
                                    <li class="active"><a href="#">S</a></li>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">SL</a></li>
                                </ul>
                                <ul class="color-option">
                                    <li><span class="text-uppercase">Color:</span></li>
                                    <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                                    <li><a href="#" style="background-color:#8A2454;"></a></li>
                                    <li><a href="#" style="background-color:#BF6989;"></a></li>
                                    <li><a href="#" style="background-color:#9A54D8;"></a></li>
                                </ul>
                            </div>

                            <div class="product-btns">
                                <div class="qty-input">
                                    <span class="text-uppercase">QTY: </span>
                                    <input class="input" type="number">
                                </div>
                                <a href="{{route('addtocart',$product->id)}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                                <div class="pull-right">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                <li><a data-toggle="tab" href="#tab1">Details</a></li>
                                <li><a data-toggle="tab" href="#tab2">Reviews {{ $countreview }}</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p>{!! $product->detail !!}</p>
                                </div>
                                <div id="tab2" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-reviews">

                                                @foreach($reviews as $review)
                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><a href="#"><i class="fa fa-user-o"></i> {{$review->user->name}}</a></div>
                                                        <div><a href="#"><i class="fa fa-clock-o"></i>{{$review->created_at}} </a></div>
                                                        <div class="review-rating pull-right">
                                                            <i class="fa fa-star @if($review->rate<1) -o empty @endif"></i>
                                                            <i class="fa fa-star @if($review->rate<2) -o empty @endif"></i>
                                                            <i class="fa fa-star @if($review->rate<3) -o empty @endif"></i>
                                                            <i class="fa fa-star @if($review->rate<4) -o empty @endif"></i>
                                                            <i class="fa fa-star @if($review->rate<5) -o empty @endif"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <strong>{{$review->subject}}</strong>
                                                        <p>{{$review->review}}</p>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <ul class="reviews-pages">
                                                    <li class="active">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Write Your Review</h4>
                                            @livewire('review',['id' => $product->id])
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Product Details -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
