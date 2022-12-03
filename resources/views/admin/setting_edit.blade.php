@extends('layouts.admin')

@section('title','Setting Edit')

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
                          <h4 class="mb-sm-0">Setting Edit</h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item active"><a href="{{route('admin_settings')}}">Settings</a></li>
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Setting Edit</a></li>
                              </ol>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- end page title -->

              <div class="row">
                  <form action="{{route('admin_setting_update',$settings->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                  <div class="col-12">
                          <div class="card">
                          <div class="card-body">
                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="home" aria-selected="true">General</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="smtp-tab" data-bs-toggle="tab" data-bs-target="#smtp" type="button" role="tab" aria-controls="profile" aria-selected="false">Smtp Email</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab" aria-controls="messages" aria-selected="false">Social Media</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="aboutus-tab" data-bs-toggle="tab" data-bs-target="#aboutus" type="button" role="tab" aria-controls="settings" aria-selected="false">About Us</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="settings" aria-selected="false">Contact Page</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="referances-tab" data-bs-toggle="tab" data-bs-target="#referances" type="button" role="tab" aria-controls="settings" aria-selected="false">Referances</button>
                                  </li>
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                  <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">

                                      <div class="row mb-3">
                                          <input class="form-control" type="hidden" name="id" id="id" value="{{$settings->id}}">
                                      </div>

                                      <div class="row mb-3">
                                          <label for="title" class="col-sm-2 col-form-label">Title</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="text" name="title" id="title" value="{{$settings->title}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="text" name="keywords" id="keywords" value="{{$settings->keywords}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="description" class="col-sm-2 col-form-label">Description</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="text" name="description" id="description" value="{{$settings->description}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="company" class="col-sm-2 col-form-label">Company</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="text" name="company" id="company" value="{{$settings->company}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="address" class="col-sm-2 col-form-label">Address</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="text" name="address" id="address" value="{{$settings->address}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="number" name="phone" id="phone" value="{{$settings->phone}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="fax" class="col-sm-2 col-form-label">Fax</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="number" name="fax" id="fax" value="{{$settings->fax}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="email" name="email" id="email" value="{{$settings->email}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label class="col-sm-2 col-form-label">Status</label>
                                          <div class="col-sm-10">
                                              <select class="form-select" name="status" aria-label="Default select example">
                                                  <option value="True" @if ($settings->status == 'True') selected="selected" @endif>True</option>
                                                  <option value="False" @if ($settings->status == 'False') selected="selected" @endif>False</option>
                                              </select>
                                          </div>
                                      </div>
                                      <!-- end row -->
                                  </div>

                                  <div class="tab-pane" id="smtp" role="tabpanel" aria-labelledby="smtp-tab">

                                      <div class="row mb-3">
                                          <label for="smtpserver" class="col-sm-2 col-form-label">Smtp Server</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="text" name="smtpserver" id="smtpserver" value="{{$settings->smtpserver}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="smtpemail" class="col-sm-2 col-form-label">Smtp Email</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="email" name="smtpemail" id="smtpemail" value="{{$settings->smtpemail}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="smtppassword" class="col-sm-2 col-form-label">Smtp Password</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="password" name="smtppassword" id="smtppassword" value="{{$settings->smtppassword}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="smtpport" class="col-sm-2 col-form-label">Smtp Port</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="number" name="smtpport" id="smtpport" value="{{$settings->smtpport}}">
                                          </div>
                                      </div>
                                      <!-- end row -->
                                  </div>

                                  <div class="tab-pane" id="social" role="tabpanel" aria-labelledby="social-tab">

                                      <div class="row mb-3">
                                          <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="text" name="facebook" id="facebook" value="{{$settings->facebook}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="text" name="instagram" id="instagram" value="{{$settings->instagram}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="text" name="twitter" id="twitter" value="{{$settings->twitter}}">
                                          </div>
                                      </div>
                                      <!-- end row -->

                                      <div class="row mb-3">
                                          <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
                                          <div class="col-sm-10">
                                              <input class="form-control" type="text" name="youtube" id="youtube" value="{{$settings->youtube}}">
                                          </div>
                                      </div>
                                      <!-- end row -->
                                  </div>

                                  <div class="tab-pane" id="aboutus" role="tabpanel" aria-labelledby="aboutus-tab">

                                      <div class="row mb-3">
                                          <label for="aboutus" class="col-sm-2 col-form-label">About Us</label>
                                          <div class="col-sm-10">
                                              <textarea id="elm1" name="aboutus" value="{{$settings->aboutus}}">{!! $settings->aboutus !!}</textarea>
                                          </div>
                                      </div>
                                      <!-- end row -->
                                  </div>

                                  <div class="tab-pane" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                      <div class="row mb-3">
                                          <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                                          <div class="col-sm-10">
                                              <textarea id="elm2" name="contact" value="{{$settings->contact}}">{!! $settings->contact !!}</textarea>
                                          </div>
                                      </div>
                                      <!-- end row -->
                                  </div>

                                  <div class="tab-pane" id="referances" role="tabpanel" aria-labelledby="referances-tab">

                                      <div class="row mb-3">
                                          <label for="referances" class="col-sm-2 col-form-label">Referances</label>
                                          <div class="col-sm-10">
                                              <textarea id="elm3" name="referances" value="{{$settings->referances}}">{!! $settings->referances !!}</textarea>
                                          </div>
                                      </div>
                                      <!-- end row -->
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                      <div class="card-body">
                          <div class="d-grid mb-3">
                              <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Update Settings</button>
                          </div>
                      </div>
                  </form>
              </div>

          </div>
          <!-- container-fluid -->
          </div>
      <!-- End Page-content -->
      </div>

@endsection

@section('css')


@endsection

@section('js')

<!--tinymce js-->
<script src="{{asset('back/')}}/assets/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="{{asset('back/')}}/assets/js/pages/form-editor.init.js"></script>

@endsection





