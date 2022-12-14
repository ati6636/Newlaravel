@extends('layouts.admin')

@section('title','User Edit')

@section('content')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">User Edit</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><a href="{{route('admin_users')}}">User List</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">User Edit</a></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin_user_update', $data->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name" id="name"
                                                   value="{{$data->name}}">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="email" name="email" id="email"
                                                   value="{{$data->email}}">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="phone" id="phone"
                                                   value="{{$data->phone}}">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="tex" name="address" id="address"
                                                   value="{{$data->address}}">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            @if($data->profile_photo_path)
                                                <img src="{{Storage::url($data->profile_photo_path) }}" height="30"
                                                     alt="">
                                            @endif
                                            <input type="file" class="form-control form-control-color w-100" id="image"
                                                   name="image">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="card-body">
                                        <div class="d-grid mb-3">
                                            <button type="submit"
                                                    class="btn btn-primary btn-lg waves-effect waves-light">Update User
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div> <!-- end col -->
                    </div>

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

        </div>
        <!-- end main content-->

        @endsection

        @section('js')
            <!--tinymce js-->
            <script src="{{asset('back/')}}/assets/libs/tinymce/tinymce.min.js"></script>
            <!-- init js -->
            <script src="{{asset('back/')}}/assets/js/pages/form-editor.init.js"></script>
            <script src="{{asset('back/')}}/assets/js/app.js"></script>
@endsection
