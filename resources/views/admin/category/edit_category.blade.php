
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
                        <h4 class="mb-sm-0 font-size-18">category !</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">category !</li>
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
                                    <h4 class="card-title">Category Information</h4>
                                    <p class="card-title-desc">Fill required information below</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="{{url('admin/categories')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left me-1"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/category/update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$category->id}}">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="mb-3">
                                            <label for="name">Title:</label>
                                            <input id="name" name="title" type="text" class="form-control" value="{{$category->title}}">
                                        </div>
                                        <div class="mb-3 img-input-div {{$category->image!='' ? 'd-none' : ''}}">
                                            <label>Image:</label>
                                            <input name="image" type="file" class="form-control" >
                                        </div>
                                        <div class="mb-3 img-preview-div {{$category->image=='' ? 'd-none' : ''}}" height="150" width="100">
                                            <div style="height: 150px;width:100px">
                                                <div>
                                                    <img src="{{url($storage_path.$category->image)}}" height="100" width="100">  
                                                </div>     
                                                <p class="text-center"><button type="button" class="btn btn-link py-0 img-delete-btn" data-attribute="{{$category->id}}">delete</button></p>                        
                                            </div>
                                            <input type="hidden" id="del_img" name="del_img" value="">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Parent Category:</label>
                                            <select class="form-select" name="category_id">
                                                <option value="">none</option>
                                                @foreach ($categories as $item)
                                                <option value="{{$item->id}}" {{$item->id==$category->category_id ? 'selected' : ''}}>{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                    <a href="{{url('admin/categories')}}" class="btn btn-secondary waves-effect waves-light">Cancel</a>
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
<script>
    $(document).ready(function(){
        $('button.img-delete-btn').click(function(){
            // var id = $(this).attr('data-attribute');
            $(this).parents(".img-preview-div").hide();
            $('.img-input-div').removeClass('d-none');
            $("#del_img").val('true');
        });
    });
</script>
@endsection