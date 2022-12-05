@extends('layouts.admin')

@section('title','Review Detail')

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
                            <h4 class="mb-sm-0">Review Detail</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><a href="{{route('admin_review')}}">Review
                                            List</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Review Detail</a></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div>
                                @include('home.message')
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('admin_review_update',$data->id)}}">
                                    @csrf
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <tr>
                                            <th>Id</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{$data->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Product</th>
                                            <td>{{$data->product->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <td>{{$data->subject}}</td>
                                        </tr>
                                        <tr>
                                            <th>Review</th>
                                            <td>{{$data->review}}</td>
                                        </tr>
                                        <tr>
                                            <th>Rate</th>
                                            <td>{{$data->rate}}</td>
                                        </tr>
                                        <tr>
                                            <th>IP</th>
                                            <td>{{$data->IP}}</td>
                                        </tr>
                                        <tr>
                                            <th>Create Date</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Update Date</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <select name="status">
                                                    <option selected>{{$data->status}}</option>
                                                    <option>True</option>
                                                    <option>False</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="card-footer">
                                        <div class="d-grid mb-3">
                                            <button type="submit"
                                                    class="btn btn-primary btn-lg waves-effect waves-light">Update
                                                Review
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
