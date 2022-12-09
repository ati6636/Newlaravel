@extends('layouts.admin')

@section('title','Review Detail')

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
                            <h4 class="mb-sm-0">Order Detail</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><a href="{{route('admin_review')}}">Review
                                            List</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Review Detail</a></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div>
                                @include('home.message')
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('admin_order_update',$data->id)}}">
                                    @csrf
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <tr>
                                            <th>Id</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>User</th>
                                            <td>{{$data->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{$data->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{$data->address}}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{$data->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$data->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>{{$data->total}}</td>
                                        </tr>
                                        <tr>
                                            <th>IP</th>
                                            <td>{{$data->IP}}</td>
                                        </tr>
                                        <tr>
                                            <th>Create Date</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Update Date</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <select name="status">
                                                    <option selected>{{$data->status}}</option>
                                                    <option>Accepted</option>
                                                    <option>Canceled</option>
                                                    <option>Shipping</option>
                                                    <option>Complated</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Admin Note</th>
                                            <td><textarea name="note" id="elm1" rows="3"
                                                          cols="15">{{ $data->note }}</textarea></td>
                                        </tr>
                                    </table>
                                    <div class="card-footer">
                                        <div class="d-grid mb-3">
                                            <button type="submit"
                                                    class="btn btn-primary btn-lg waves-effect waves-light">Update
                                                Order
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Note</th>
                                        <th class="text-center">Update</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($datalist as $dat)
                                        <tr>
                                            <td class="text-center" style="width: 50px">
                                                @if($dat->product->image)
                                                    <img src="{{ asset( Storage::url($dat->product->image)) }}"
                                                         height="30"
                                                         alt="">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('product',['id' => $dat->product->id, 'slug' => $dat->product->slug])}}">
                                                    {{$dat->product->title}}
                                                </a>
                                            </td>
                                            <td class="text-center" style="width: 50px">{{$dat->quantity}}</td>
                                            <td class="text-center"
                                                style="width: 50px">{{$dat->product->price}}
                                            </td>
                                            <td class="text-center" style="width: 50px">{{$dat->amount}}</td>
                                            <form method="post"
                                                  action="{{route('admin_order_item_update',$dat->id)}}">
                                                @csrf
                                                <td class="text-center"
                                                    style="width: 50px">
                                                    <select name="status">
                                                        <option selected>{{$dat->status}}</option>
                                                        <option>Accepted</option>
                                                        <option>Canceled</option>
                                                        <option>Shipping</option>
                                                        <option>Completed</option>
                                                    </select>
                                                </td>
                                                <td class="text-center" style="width: 50px">
                                                    <label>
                                                        <textarea name="note">{{ $dat->note }}</textarea>
                                                    </label>
                                                </td>
                                                <td class="text-center" style="width: 50px">
                                                    <button type="submit"
                                                            class="btn btn-success btn-md waves-effect waves-light">
                                                        <i class="mdi mdi-update"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th class="empty" colspan="4"></th>
                                        <th>SUBTOTAL</th>
                                        <th colspan="2" class="sub-total">$ {{ $data->total}}</th>
                                    </tr>
                                    </tfoot>
                                </table>
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
