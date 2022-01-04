
@extends('admin.layout')

@section('stylesheet')
    <!-- DataTables -->
    <link href="{{ asset('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
            
@section('content')
    
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Seller !</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Seller !</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Seller List</h4>
                            <p class="card-title-desc">You can change status or anything by editing a seller.
                            </p>
                        </div>
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Registered</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                
                                @foreach ($sellers as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <div>
                                            @switch($item->status)
                                                @case('approved')
                                                <span class="badge rounded-pill badge-soft-primary font-size-11">Approved</span>
                                                    @break

                                                @case('pending')
                                                <span class="badge rounded-pill badge-soft-warning font-size-11">Pending</span>
                                                    @break

                                                @default
                                                <span class="badge rounded-pill badge-soft-danger font-size-11">Declined</span>
                                            @endswitch
                                            
                                        </div>
                                    </td>
                                    <td>{{$item->created_at->toDateString()}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                                <li><a href="{{url('admin/seller/edit/'.$item->id)}}" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Edit</a></li>
                                                <li><a href="#" class="dropdown-item"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            

            
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection

@section('script')
<script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>    

<script src="{{ asset('assets/admin/js/app.js') }}"></script>
@endsection