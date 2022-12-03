@extends('layouts.admin')

@section('title','Sayfa')

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
                          <h4 class="mb-sm-0">Starter page</h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                                  <li class="breadcrumb-item active">Starter page</li>
                              </ol>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- end page title -->

          </div> <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

      <footer class="footer">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-6">
                      <script>document.write(new Date().getFullYear())</script> © Upcube.
                  </div>
                  <div class="col-sm-6">
                      <div class="text-sm-end d-none d-sm-block">
                          Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                      </div>
                  </div>
              </div>
          </div>
      </footer>

  </div>
  <!-- end main content-->

@endsection
