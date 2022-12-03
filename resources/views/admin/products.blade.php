@extends('layouts.admin')

@section('title','Product')

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
                            <h4 class="mb-sm-0">Product List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Product List</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admin_product_create')}}">Product Create</a></li>
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
                                              <th>Category</th>
                                              <th>Image</th>
                                              <th>Image Gallery</th>
                                              <th>Title</th>
                                              <th>Quantity</th>
                                              <th>Price</th>
                                              <th>Status</th>
                                              <th>Edit</th>
                                              <th>Delete</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($products as $product)
                                          <tr>
                                              <td style="width: 50px">{{$product->id}}</td>
                                              <td style="width: 50px">
                                                  {{ \App\Http\Controllers\admin\CategoryController::getParentsTree($product->category, $product->category->title) }}
                                              </td>
                                              <td style="width: 100px">
                                                  @if($product->image)
                                                      <img src="{{ asset( Storage::url($product->image )) }}" height="30" alt="">
                                                  @endif
                                              </td>
                                              <td style="width: 100px">
                                                  <a href="{{route('admin_image_create', $product->id)}}">
                                                      <i class="ri-image-add-fill"></i>
                                                  </a>
                                              </td>
                                              <td>{{$product->title}}</td>
                                              <td style="width: 100px">{{$product->quantity}}</td>
                                              <td style="width: 100px">{{$product->price}}</td>
                                              <td style="width: 100px">{{$product->status}}</td>
                                              <td style="width: 100px">
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Edit" href="{{route('admin_product_edit', $product->id)}}">
                                                      <i class="fas fa-pencil-alt"></i>
                                                  </a>
                                              </td>
                                              <td style="width: 100px">
                                                  <a class="btn btn-outline-secondary btn-sm delete" title="Delete" href="{{route('admin_product_delete', $product->id)}}" onclick= "return confirm('Delete ! Are you sure')">
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
