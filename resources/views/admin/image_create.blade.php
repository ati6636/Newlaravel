@extends('layouts.admin')

@section('title','Image Create')

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
                          <h4 class="mb-sm-0">{{$images->title}}</h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item active"><a href="{{route('admin_products')}}">Product List</a></li>
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Image Create</a></li>
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
                              <form action="{{route('admin_image_store', $images->id)}}" method="post" enctype="multipart/form-data">
                                  @csrf

                                  <div class="row mb-3">
                                      <label for="title" class="col-sm-2 col-form-label">Title</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="title" id="title">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="image" class="col-sm-2 col-form-label">Image</label>
                                      <div class="col-sm-10">
                                          <input type="file" class="form-control form-control-color w-100" id="image" name="image">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="card-body">
                                          <div class="d-grid mb-3">
                                              <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Create Image</button>
                                          </div>
                                      </div>
                              </form>

                              <div class="card-footer">
                                  <div class="table-responsive">
                                      <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                          <thead>
                                          <tr>
                                              <th>Id</th>
                                              <th>Image</th>
                                              <th>Title</th>
                                              <th>Delete</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          @foreach ($image as $img)
                                              <tr>
                                                  <td style="width: 50px">{{$img->id}}</td>
                                                  <td style="width: 300px">
                                                      @if($img->image)
                                                          <img src="{{ asset( Storage::url($img->image)) }}" height="100" alt="">
                                                      @endif
                                                  </td>
                                                  <td>{{$img->title}}</td>
                                                  <td style="width: 100px">
                                                      <a class="btn btn-outline-secondary btn-sm delete" title="Delete" href="{{route('admin_image_delete', [$img->id, $images->id])}}" onclick="return confirm('Recort will be Delete ! Are you sure')">
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
