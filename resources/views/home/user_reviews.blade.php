@extends('layouts.home')

@section('title', 'My Review')

@section('author','Sedat İŞLEK')

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Blank</li>
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
                            <th>Product</th>
                            <th>Subject</th>
                            <th>Review</th>
                            <th>Rate</th>
                            <th>Status</th>
                            <th>Date</th>

                            <th style="" colspan="3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('home.message')
                        @foreach($datalist as $datas)
                            <tr>
                                <td>{{ $datas->id }}</td>
                                <td>
                                    <a href="{{ route('product',['id' =>$datas->product->id,'slug' => $datas->product->slug])}}"
                                       target="_blank">
                                        {{ $datas->product->title }}
                                    </a>
                                </td>
                                <td>{{ $datas->subject }}</td>
                                <td>{{ $datas->review }}</td>
                                <td>{{ $datas->rate }}</td>
                                <td>{{ $datas->status }}</td>
                                <td>{{ $datas->created_at }}</td>
                                <td>
                                    <a href="{{route('user_review_delete',['id' => $datas->id])}}"
                                       onclick="return confirm('Delete ! Are you sure?')"><i class="fa fa-trash"></i>
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
