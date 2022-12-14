@extends('layouts.admin')

@section('title','Users')

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
                            <h4 class="mb-sm-0">Users List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Users List</a></li>
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
                                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                      <thead>
                                          <tr>
                                              <th>Id</th>
                                              <th>Photo</th>
                                              <th>Name</th>
                                              <th>Email</th>
                                              <th>Phone</th>
                                              <th>Address</th>
                                              <th>Roles</th>
                                              <th>Edit</th>
                                              <th>Add Role</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($datalist as $data)
                                          <tr>
                                              <td style="width: 50px">{{$data->id}}</td>
                                              <td style="width: 100px">
                                                  @if($data->profile_photo_path)
                                                      <img src="{{ Storage::url($data->profile_photo_path ) }}" height="30" style="border-radius: 10px" alt="">
                                                  @endif
                                              </td>
                                              <td style="width: 100px">{{$data->name}}</td>
                                              <td style="width: 100px">{{$data->email}}</td>
                                              <td style="width: 100px">{{$data->phone}}</td>
                                              <td style="width: 100px">{{$data->address}}</td>
                                              <td style="width: 100px">
                                                  @foreach($data->roles as $row)
                                                    {{$row->name}} /
                                                  @endforeach
                                              </td>
                                              <td style="width: 100px">
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Edit" href="{{route('admin_user_edit', $data->id)}}">
                                                      <i class="fas fa-pencil-alt"></i>
                                                  </a>
                                              </td>
                                              <td style="width: 100px">
                                                  <a class="btn btn-outline-secondary btn-sm delete" title="Delete" href="{{route('admin_user_roles',$data->id)}}" >
                                                      <i class="fas fa-plus-circle"></i>
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
