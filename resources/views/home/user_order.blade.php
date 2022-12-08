@extends('layouts.home')

@section('title', 'My Orders')

@section('author','Sedat İŞLEK')

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">User Orders</li>
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
                <div id="main" class="col-md-10">
                    <table id="example-1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $dat)
                            <tr>
                                <td style="width: 50px">{{$dat->id}}</td>
                                <td style="width: 50px">{{$dat->name}}</td>
                                <td style="width: 50px">{{$dat->email}}</td>
                                <td style="width: 50px">{{$dat->address}}</td>
                                <td style="width: 50px">{{$dat->phone}}</td>
                                <td style="width: 50px">{{$dat->total}}</td>
                                <td style="width: 50px">{{$dat->created_at}}</td>
                                <td style="width: 50px">{{$dat->status}}</td>
                                <td style="width: 50px">
                                    <a class="btn btn-outline-secondary" title="Edit" href="{{route('user_order_show', $dat->id)}}">
                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
