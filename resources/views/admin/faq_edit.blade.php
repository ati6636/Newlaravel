@extends('layouts.admin')

@section('title','Faq Edit')

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
                            <h4 class="mb-sm-0">Faq Edit</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><a href="{{route('admin_faq')}}">Faq List</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Faq Edit</a></li>
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
                                <form action="{{route('admin_faq_update', $data->id)}}" method="post">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="position" class="col-sm-2 col-form-label">Position</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="position" id="position"
                                                   value="{{ $data->position }}">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="questions" class="col-sm-2 col-form-label">Questions</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="questions" id="questions"
                                                   value="{{ $data->questions }}">
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label for="answer" class="col-sm-2 col-form-label">Answer</label>
                                        <div class="col-sm-10">
                                            <textarea id="elm1" name="answer">{!! $data->answer !!} </textarea>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status" aria-label="Default select example">
                                                <option value="True" @if ($data->status == 'True') selected="selected" @endif>True</option>
                                                <option value="False" @if ($data->status == 'False') selected="selected" @endif>False</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="card-body">
                                        <div class="d-grid mb-3">
                                            <button type="submit"
                                                    class="btn btn-primary btn-lg waves-effect waves-light">Update Faq
                                            </button>
                                        </div>
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
