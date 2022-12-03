@extends('layouts.admin')

@section('title','Message Detail')

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
                          <h4 class="mb-sm-0">Message Detail</h4>
                            <div>
                                @include('home.message')
                            </div>
                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item active"><a href="{{route('admin_message')}}">Message List</a></li>
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Message Detail</a></li>
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
                              <form method="post" action="{{route('admin_message_update',$data->id)}}">
                                  @csrf
                                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                      <tr>
                                          <th>Id</th><td>{{$data->id}}</td>
                                      </tr>
                                      <tr>
                                          <th>Name</th><td>{{$data->name}}</td>
                                      </tr>
                                      <tr>
                                          <th>Email</th><td>{{$data->email}}</td>
                                      </tr>
                                      <tr>
                                          <th>Phone</th><td>{{$data->phone}}</td>
                                      </tr>
                                      <tr>
                                          <th>Subject</th> <td>{{$data->subject}}</td>
                                      </tr>
                                      <tr>
                                          <th>Message</th><td>{{$data->message}}</td>
                                      </tr>
                                      <tr>
                                          <th>Admin Note</th>
                                          <td>
                                              <textarea name="note" id="elm1" cols="30" rows="10">{!! $data->note !!}</textarea>
                                          </td>
                                      </tr>
                                      <tr>
                                          <th>Status</th><td>{{$data->status}}</td>
                                      </tr>
                                  </table>
                                  <div class="card-footer">
                                      <div class="d-grid mb-3">
                                          <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Update Message</button>
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
