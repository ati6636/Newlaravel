@extends('layouts.home')

@section('title', 'My Orderitem')

@section('author','Sedat İŞLEK')

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">User Orderitem</li>
            </ul>
            <div>
                @include('home.message')
            </div>

        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-2">
                    @include('home.usermenu')
                </div>
                <!-- /ASIDE -->

                <!-- MAIN -->
                <div class="col-md-10">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Orderitem Review</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <tr>
                                <th class="text-center">Product</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Note</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data as $dat)
                                <tr>
                                    <td class="text-center" style="width: 50px">
                                        @if($dat->product->image)
                                            <img src="{{ asset( Storage::url($dat->product->image)) }}" height="30"
                                                 alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('product',['id' => $dat->product->id, 'slug' => $dat->product->slug])}}">
                                            {{$dat->product->title}}
                                        </a>
                                    </td>
                                    <td class="text-center" style="width: 50px">{{$dat->quantity}}</td>
                                    <td class="text-center" style="width: 50px">{{$dat->product->price}}</td>
                                    <td class="text-center" style="width: 50px">{{$dat->amount}}</td>
                                    <td class="text-center" style="width: 50px">{{$dat->status}}</td>
                                    <td class="text-center" style="width: 50px">{{$dat->note}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="empty" colspan="4"></th>
                                <th>SUBTOTAL</th>
                                <th colspan="2" class="sub-total">$ {{$dat->order->total}}</th>
                            </tr>
                            </tfoot>

                        </table>
                    </div>

                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
