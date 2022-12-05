@extends('layouts.admin')

@section('title','Review List')

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
                            <h4 class="mb-sm-0">Review List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><a href="{{route('admin_review')}}">Review List</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Review Detail</a></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div>
                                @include('home.message')
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product</th>
                                            <th>Subject</th>
                                            <th>Review</th>
                                            <th>Rate</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($datalist as $datas)
                                            <tr>
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

                                                <td style="width: 100px">
                                                    <a class="btn btn-outline-secondary btn-sm edit" title="Edit"
                                                       href="{{route('admin_review_show', $datas->id)}}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                                <td style="width: 100px">
                                                    <a class="btn btn-outline-secondary btn-sm delete" title="Delete"
                                                       href="{{route('user_review_delete',['id' => $datas->id])}}"
                                                       onclick= "return confirm('Delete ! Are you sure')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>
    <!-- end main content-->

@endsection


@section('js')
    <!-- Buttons examples -->
    <script src="{{asset('back/')}}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('back/')}}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('back/')}}/assets/libs/jszip/jszip.min.js"></script>
    <script src="{{asset('back/')}}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{asset('back/')}}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{asset('back/')}}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('back/')}}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('back/')}}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <script src="{{asset('back/')}}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{asset('back/')}}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{asset('back/')}}/assets/js/pages/datatables.init.js"></script>


@endsection
