
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
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title">Seller Information</h4>
                                    <p class="card-title-desc">Fill required information below</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="{{url('admin/seller')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left me-1"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/seller/update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="mb-3">
                                            <label for="name">Seller Name:</label>
                                            <input id="name" name="name" type="text" class="form-control" value="{{$seller->name}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email:</label>
                                            <input id="email" name="email" type="email" class="form-control" value="{{$seller->email}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile">Mobile no.:</label>
                                            <input id="mobile" name="mobile" type="text" class="form-control" value="{{$seller->mobile}}">
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="manufacturerbrand">Mobile no.:</label>
                                            <input id="manufacturerbrand" name="manufacturerbrand" type="text" class="form-control">
                                        </div> --}}
                                        <div class="mb-3">
                                            <label for="address">Registered Address:</label>
                                            <input id="address" name="address" type="text" class="form-control" value="{{$seller->address}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="additional_details">Additional Details</label>
                                            <textarea class="form-control" id="additional_details" rows="5" >{{$seller->additional_details}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select">
                                                <option value="approved" {{$seller->status=='approved' ? 'selected' : ''}}>Approved</option>
                                                <option value="pending" {{$seller->status=='pending' ? 'selected' : ''}}>Pending</option>
                                                <option value="declined" {{$seller->status=='declined' ? 'selected' : ''}}>Declined</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                    <a href="{{url('admin/seller')}}" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            

            
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection

@section('script')
<script src="{{ asset('assets/admin/js/app.js') }}"></script>

@endsection