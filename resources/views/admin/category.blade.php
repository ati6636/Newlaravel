@extends('layouts.admin')

@section('title','Category')

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
                          <h4 class="mb-sm-0">Category List</h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item active"><a href="javascript: void(0);">Category List</a></li>
                                  <li class="breadcrumb-item"><a href="{{route('admin_category_add')}}">Category Add</a></li>
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
                                          <th>Image</th>
                                          <th>Parent</th>
                                          <th>Title</th>
                                          <th>Status</th>
                                          <th>Created_At</th>
                                          <th>Edit</th>
                                          <th>Delete</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($categories as $category)
                                          <tr>
                                              <td style="width: 100px">
                                                  @if($category->image)
                                                      <img src="{{ asset( Storage::url($category->image )) }}" height="50" alt="">
                                                  @endif
                                              </td>
                                              <td>
                                                  {{ \App\Http\Controllers\admin\CategoryController::getParentsTree($category, $category->title) }}
                                              </td>
                                              <td>{{$category->title}}</td>
                                              <td>{{$category->status}}</td>
                                              <td>{{$category->created_at}}</td>
                                              <td style="width: 100px">
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Edit" href="{{route('admin_category_edit', $category->id)}}">
                                                      <i class="fas fa-pencil-alt"></i>
                                                  </a>
                                              </td>
                                              <td style="width: 100px">
                                                  <a class="btn btn-outline-secondary btn-sm delete" title="Delete" href="{{route('admin_category_delete', $category->id)}}" onclick="return confirm('Delete ! Are you sure')">
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

@section('css')
  <!-- DataTables -->
  <link href="{{asset('back/')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('back/')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('back/')}}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
