@extends('layouts.home')

@section('title', 'Edit Product')

@section('author','Sedat İŞLEK')

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Create Product</li>
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
                    <form action="{{route('user_product_store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row" style="margin-bottom: 15px;">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id"
                                        aria-label="Default select example">
                                    @foreach($data as $dat)
                                        <option value="{{$dat->id}}">
                                            {{ \App\Http\Controllers\admin\CategoryController::getParentsTree($dat, $dat->title) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row" style="margin-bottom: 15px;">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" id="title">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row" style="margin-bottom: 15px;">
                            <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="keywords" id="keywords">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row" style="margin-bottom: 15px;">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="description" id="description">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row" style="margin-bottom: 15px;">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" value="0" name="price" id="price">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row" style="margin-bottom: 15px;">
                            <label for="quantity" class="col-sm-2 col-form-label">Quantitiy</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" value="1" name="quantity"
                                       id="quantity">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row" style="margin-bottom: 15px;">
                            <label for="minquantity" class="col-sm-2 col-form-label">Minimum
                                Quantitiy</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" value="5" name="minquantity"
                                       id="minquantity">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row" style="margin-bottom: 15px;">
                            <label for="tax" class="col-sm-2 col-form-label">Tax</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" value="1" name="tax" id="tax">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row" style="margin-bottom: 15px;">
                            <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" class="form-control" name="detail"></textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row" style="margin-bottom: 15px;">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control form-control-color w-100" id="image"
                                       name="image">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="card-body">
                            <div class="d-grid" style="margin-bottom: 15px;">
                                <button type="submit"
                                        class="btn btn-primary btn-lg waves-effect waves-light btn-block">Create
                                    Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection

@section('js')
    <!--tinymce js-->
    <script src="{{asset('back/')}}/assets/libs/tinymce/tinymce.min.js"></script>
    <!-- init js -->
    <script src="{{asset('back/')}}/assets/js/pages/form-editor.init.js"></script>
    <script src="{{asset('back/')}}/assets/js/app.js"></script>
@endsection

