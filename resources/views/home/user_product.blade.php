@extends('layouts.home')

@section('title', 'My Products')

@section('author','Sedat İŞLEK')

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">User Product</li>
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
                <div class="btn-group" style="margin-bottom: 15px;margin-left: 15px;">
                    <button class="primary-btn pointer-hover btn-lg"><a href="{{route('user_product_create')}}"> Create Product</a></button>
                </div>

                <!-- MAIN -->
                <div id="main" class="col-md-10">
                    <table id="example-1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Image Gallery</th>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $dat)
                            <tr>
                                <td style="width: 50px">{{$dat->id}}</td>
                                <td>
                                    {{ \App\Http\Controllers\admin\CategoryController::getParentsTree($dat->category, $dat->category->title) }}
                                </td>
                                <td style="width: 100px">
                                    @if($dat->image)
                                        <img src="{{ asset( Storage::url($dat->image)) }}" height="30" alt="">
                                    @endif
                                </td>
                                <td style="width: 50px">
                                    <a href="{{route('user_image_create', $dat->id)}}">
                                        <i class="fa fa-picture-o"></i>
                                    </a>
                                </td>
                                <td>{{$dat->title}}</td>
                                <td style="width: 50px">{{$dat->quantity}}</td>
                                <td style="width: 50px">{{$dat->price}}</td>
                                <td style="width: 50px">{{$dat->status}}</td>
                                <td style="width: 50px">
                                    <a class="btn btn-outline-secondary btn-sm edit" title="Edit" href="{{route('user_product_edit', $dat->id)}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                                <td style="width: 50px">
                                    <a class="btn btn-outline-secondary btn-sm delete" title="Delete" href="{{route('user_product_delete', $dat->id)}}" onclick= "return confirm('Delete ! Are you sure')">
                                        <i class="fa fa-trash"></i>
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
