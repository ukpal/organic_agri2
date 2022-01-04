
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
                        <h4 class="mb-sm-0 font-size-18">Welcome !</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Welcome !</li>
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
                                    <h4 class="card-title">Product Information</h4>
                                    <p class="card-title-desc">Fill required information below</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="{{url('admin/products')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left me-1"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/product/update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="name">Name:</label>
                                            <input id="name" name="name" type="text" class="form-control" value="{{$product->name}}">
                                        </div>
                                        
                                        
                                        <div class="mb-3">
                                            <label class="form-label"> Category:</label>
                                            <select class="form-select" name="category_id">
                                                <option>Select Category</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{$item->id}}" {{$item->id==$product->category_id ? 'selected':''}}>{{$item->title}}</option>
                                                    @foreach ($item->childrenCategories as $sub_category)
                                                    <option value="{{$sub_category->id}}" {{$sub_category->id==$product->category_id ? 'selected':''}}>--{{$sub_category->title}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="quantity">Quantity:</label>
                                            <input id="quantity" name="quantity" type="text" class="form-control" value="{{$product->quantity}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="price">Price:</label>
                                            <input id="price" name="price" type="text" class="form-control" value="{{$product->price}}">
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-item">
                                                <label class="form-label"> Unit:</label>
                                                <select class="form-select" name="unit">
                                                  <option>Select Unit</option>
                                                  <option value="kg" {{$product->unit=='kg' ? 'selected':''}}>kg</option>
                                                  <option value="lt" {{$product->unit=='lt' ? 'selected':''}}>lt</option>                              
                                                  <option value="gm" {{$product->unit=='gm' ? 'selected':''}}>gm</option>                                            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Short Description:</label>
                                            <textarea name="short_description" class="form-control" rows="5" placeholder="Sort Description">{{$product->short_description}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Long Description:</label>
                                            <textarea name="long_description" class="form-control" rows="5" placeholder="Description">{{$product->long_description}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-item">
                                                <label class="form-label"> Status:</label>
                                                <select class="form-select" name="status">
                                                  <option value="pending" {{$product->status=='pending' ? 'selected':''}}>Pending</option>
                                                  <option value="approved" {{$product->status=='approved' ? 'selected':''}}>Approved</option>                              
                                                  <option value="declined" {{$product->status=='declined' ? 'selected':''}}>Declined</option>                                            
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mt-4 image_1_input_div {{$product->image_1!='' ? 'd-none' : ''}}">
                                            <label>Product Image 1:</label>
                                            <input name="image_1" type="file" class="form-control" >
                                        </div>
                                        <div class="mb-3 image_1_preview_div {{$product->image_1=='' ? 'd-none' : ''}}" >
                                            <div style="height: 150px;width:100px">
                                                <div>
                                                    <img src="{{url($product_img_path.$product->image_1)}}" height="100" width="100">  
                                                </div>     
                                                <p class="text-center"><button type="button" class="btn btn-link py-0 image_1_del_btn">delete</button></p>                        
                                            </div>
                                            <input type="hidden" id="del_image_1" name="del_image_1" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mt-4 image_2_input_div {{$product->image_2!='' ? 'd-none' : ''}}">
                                            <label>Product Image 2:</label>
                                            <input name="image_2" type="file" class="form-control" >
                                        </div>
                                        <div class="mb-3 image_2_preview_div {{$product->image_2=='' ? 'd-none' : ''}}" >
                                            <div style="height: 150px;width:100px">
                                                <div>
                                                    <img src="{{url($product_img_path.$product->image_2)}}" height="100" width="100">  
                                                </div>     
                                                <p class="text-center"><button type="button" class="btn btn-link py-0 image_2_del_btn">delete</button></p>                        
                                            </div>
                                            <input type="hidden" id="del_image_2" name="del_image_2" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mt-4 image_3_input_div {{$product->image_3!='' ? 'd-none' : ''}}">
                                            <label>Product Image 3:</label>
                                            <input name="image_3" type="file" class="form-control" >
                                        </div>
                                        <div class="mb-3 image_3_preview_div {{$product->image_3=='' ? 'd-none' : ''}}" >
                                            <div style="height: 150px;width:100px">
                                                <div>
                                                    <img src="{{url($product_img_path.$product->image_3)}}" height="100" width="100">  
                                                </div>     
                                                <p class="text-center"><button type="button" class="btn btn-link py-0 image_3_del_btn">delete</button></p>                        
                                            </div>
                                            <input type="hidden" id="del_image_3" name="del_image_3" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mt-4 image_4_input_div {{$product->image_4!='' ? 'd-none' : ''}}">
                                            <label>Product Image 4:</label>
                                            <input name="image_4" type="file" class="form-control" >
                                        </div>
                                        <div class="mb-3 image_4_preview_div {{$product->image_4=='' ? 'd-none' : ''}}" >
                                            <div style="height: 150px;width:100px">
                                                <div>
                                                    <img src="{{url($product_img_path.$product->image_4)}}" height="100" width="100">  
                                                </div>     
                                                <p class="text-center"><button type="button" class="btn btn-link py-0 image_4_del_btn">delete</button></p>                        
                                            </div>
                                            <input type="hidden" id="del_image_4" name="del_image_4" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                    <a href="{{url('admin/products')}}" class="btn btn-secondary waves-effect waves-light">Cancel</a>
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
        $('button.image_1_del_btn').click(function(){
            // var id = $(this).attr('data-attribute');
            $(this).parents(".image_1_preview_div").hide();
            $('.image_1_input_div').removeClass('d-none');
            $("#del_image_1").val('true');
        });
        $('button.image_2_del_btn').click(function(){
            // var id = $(this).attr('data-attribute');
            $(this).parents(".image_2_preview_div").hide();
            $('.image_2_input_div').removeClass('d-none');
            $("#del_image_2").val('true');
        });
        $('button.image_3_del_btn').click(function(){
            // var id = $(this).attr('data-attribute');
            $(this).parents(".image_3_preview_div").hide();
            $('.image_3_input_div').removeClass('d-none');
            $("#del_image_3").val('true');
        });
        $('button.image_4_del_btn').click(function(){
            // var id = $(this).attr('data-attribute');
            $(this).parents(".image_4_preview_div").hide();
            $('.image_4_input_div').removeClass('d-none');
            $("#del_image_4").val('true');
        });
    });
</script>
@endsection