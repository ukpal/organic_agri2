
@extends('admin.layout')

@section('stylesheet')
    
@endsection
            
@section('content')
    
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Products !</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Products !</li>
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
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title">Product List</h4>
                                    <p class="card-title-desc">You can change status or anything by editing a product.</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add Product</a>
                                </div>
                            </div>                           
                        </div>
                        <div class="card-body">

                            <table class="table mb-0">

                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                    <tr>
                                        <th scope="row">#</th>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->slug}}</td>
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
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                                    <li><a href="{{url('admin/product/edit/'.$item->id)}}" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Edit</a></li>
                                                    <li><a href="{{url('admin/category/delete/'.$item->id)}}" class="dropdown-item"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a></li>
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

<script src="{{ asset('assets/admin/js/app.js') }}"></script>
@endsection