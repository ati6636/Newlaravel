@extends('layouts.admin')

@section('title','User Role')

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
                            <h4 class="mb-sm-0">User Role</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><a href="{{route('admin_users')}}">Users List</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">User Role</a></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="width: 50px">{{$data->id}}</td>
                                            <td >{{$data->name}}</td>
                                            <td >{{$data->email}}</td>
                                            <td  style="width: 150px">
                                                <table>
                                                    @foreach($data->roles as $row)
                                                        <tr>
                                                            <td>{{$row->name}}</td>
                                                            <td>
                                                                <a href="{{route('admin_user_role_delete',['userid' => $data->id, 'roleid' => $row->id])}}"
                                                                   title="Delete"
                                                                   onclick="return confirm('Delete ! Are you sure')">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </td>
                                            <td style="width: 50px">
                                                <form role="form"
                                                      action="{{route('admin_user_role_store', $data->id)}}"
                                                      method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <select name="roleid">
                                                        @foreach($datalist as $list)
                                                            <option value="{{$list->id}}">{{$list->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit"
                                                            class="btn btn-primary btn-sm waves-effect waves-light">
                                                        Add Role
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
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
