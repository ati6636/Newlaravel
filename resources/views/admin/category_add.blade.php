@extends('layouts.admin')

@section('title','Category Add')

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
                          <h4 class="mb-sm-0">Category Add</h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item active"><a href="{{route('admin_category')}}">Category List</a></li>
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Category Add</a></li>
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
                              <form action="{{route('admin_category_create')}}" method="post" enctype="multipart/form-data">
                                  @csrf

                                  <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label">Parent</label>
                                      <div class="col-sm-10">
                                          <select class="form-select" name="parent_id" aria-label="Default select example">
                                              <option value="0" selected="selected">Main Category</option>
                                              @foreach($categories as $category)
                                                  <option value="{{$category->id}}">
                                                      {{ \App\Http\Controllers\admin\CategoryController::getParentsTree($category, $category->title) }}
                                                  </option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="title" class="col-sm-2 col-form-label">Title</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="title" id="title">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="keywords" id="keywords">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="description" class="col-sm-2 col-form-label">Description</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="description" id="description">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label">Status</label>
                                      <div class="col-sm-10">
                                          <select class="form-select" name="status" aria-label="Default select example">
                                              <option value="False">False</option>
                                              <option value="True">True</option>
                                          </select>
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
                                              <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Add Category</button>
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
