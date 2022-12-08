@extends('layouts.home')

@section('title', 'My Shopcart')

@section('author','Sedat İŞLEK')

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">User Shopcart</li>
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
                            <h3 class="title">Order Review</h3>
                        </div>
                        <table class="shopping-cart-table table">
                        <tr>
                            <th class="text-center">Product</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($total = 0)
                        @foreach ($data as $dat)
                            <tr>
                                <td class="text-center" style="width: 50px">
                                    @if($dat->product->image)
                                        <img src="{{ asset( Storage::url($dat->product->image)) }}" height="30" alt="">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product',['id' => $dat->product->id, 'slug' => $dat->product->slug])}}">
                                        {{$dat->product->title}}
                                    </a>
                                </td>
                                <td class="text-center" style="width: 50px">
                                    <form action="{{route('user_shopcart_update',$dat->id)}}" method="post">
                                        @csrf
                                        <input class="text-center" name="quantity" type="number" value="{{$dat->quantity}}" min="1"
                                               max="{{$dat->product->quantity}}" onchange="this.form.submit()"/>
                                    </form>
                                </td>
                                <td class="text-center" style="width: 50px">{{$dat->product->price}}</td>
                                <td class="text-center"
                                    style="width: 50px">{{$dat->product->price * $dat->quantity}}</td>
                                <td class="text-center" style="width: 50px">
                                    <a class="btn btn-outline-secondary btn-sm delete" title="Delete"
                                       href="{{route('user_shopcart_delete', $dat->id)}}"
                                       onclick="return confirm('Delete ! Are you sure')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @php($total += $dat->product->price * $dat->quantity)
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="empty" colspan="4"></th>
                            <th>SUBTOTAL</th>
                            <th colspan="2" class="sub-total">$ {{$total}}</th>
                        </tr>
                        <tr>
                            <th class="empty" colspan="4"></th>
                            <th>SHIPING</th>
                            <td colspan="2">Free Shipping</td>
                        </tr>
                        <tr>
                            <th class="empty" colspan="4"></th>
                            <th>TOTAL</th>
                            <th colspan="2" class="total">${{$total}}</th>
                        </tr>
                        </tfoot>
                    </table>
                        <form action="{{route('user_order_create')}}" method="post">
                            @csrf
                            <input type="hidden" name="total" value="{{$total}}">
                            <div class="pull-right">
                                <button type="submit" class="primary-btn">Place Order</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
