@extends('site.layout')

@section('content')

<!-- LOGIN AREA START -->
<div class="ltn__login-area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Edit Product</h1>                        
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="account-login-inner tm-account-login-inner">
                    <form action="{{url('seller/product/update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="input-item">
                                    <select class="nice-select" name="category_id" id="category">
                                      <option>Select Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}" {{$item->id==$product->category_id ? 'selected':''}}>{{$item->title}}</option>
                                            @foreach ($item->childrenCategories as $sub_category)
                                            <option value="{{$sub_category->id}}" {{$sub_category->id==$product->category_id ? 'selected':''}}>--{{$sub_category->title}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>                         
                            {{-- <div class="col-md-4">
                                <div class="input-item">
                                    <select class="nice-select" name="sub_category_id" id="sub_category">
                                      <option>Select Sub Category</option>                                 
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-md-8">
                                <input type="text" name="name" placeholder="Product Name" value="{{$product->name}}">  
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="quantity" placeholder="Available Quantity (Example: 8000 KG)" value="{{$product->quantity}}">  
                            </div>                          
                            <div class="col-md-4">
                                <div class="tm-inline-form">
                                    <input type="text" name="price" placeholder="Price In Rupees (Example: 25000)" value="{{$product->price}}">
                                </div>                                  
                            </div>
                            <div class="col-md-4">
                                <div class="input-item">
                                    <select class="nice-select" name="unit">
                                      <option>Select Unit</option>
                                      <option value="kg" {{$product->unit=='kg' ? 'selected':''}}>kg</option>
                                      <option value="lt" {{$product->unit=='lt' ? 'selected':''}}>lt</option>                              
                                      <option value="gm" {{$product->unit=='gm' ? 'selected':''}}>gm</option>                                            
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea name="short_description" placeholder="Sort Description">{{$product->short_description}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <textarea name="long_description" placeholder="Description">{{$product->long_description}}</textarea>
                            </div>
                            <div class="col-md-3 d-none image_1_input_div" >
                                <div class="tm-file-choose-panel">
                                    <label><h5>Select Product Image 1</h5></label>
                                    <input type="file" class="form-control-file" name="image_1">
                                </div>
                            </div>
                            <div class="ltn__gallery-item filter_category_3 col-md-3 text-center">
                                <div class="ltn__gallery-item-inner">
                                    <div class="ltn__gallery-item-img">
                                        <a href="{{url($product_img_path.$product->image_1)}}" data-rel="lightcase:myCollection">
                                            <img src="{{url($product_img_path.$product->image_1)}}" alt="Image" class="ac-cert-prv" height="150">
                                            <span class="ltn__gallery-action-icon">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </a>
                                        
                                    </div>    
                                    <p class="text-center"><button type="button" class="btn btn-link py-0 image_1_del_btn">delete</button></p>                    
                                </div>
                                <input type="hidden" name="del_image_1" id="del_image_1" value="">
                            </div>
                            <div class="col-md-3 image_2_input_div {{$product->image_2!='' ? 'd-none':''}}">
                                <div class="tm-file-choose-panel">
                                    <label><h5>Select Product Image 2</h5></label>
                                    <input type="file" class="form-control-file" name="image_2">
                                </div>
                            </div>
                            <div class="ltn__gallery-item filter_category_3 col-md-3 text-center {{$product->image_2=='' ? 'd-none':''}}">
                                <div class="ltn__gallery-item-inner">
                                    <div class="ltn__gallery-item-img">
                                        <a href="{{url($product_img_path.$product->image_2)}}" data-rel="lightcase:myCollection">
                                            <img src="{{url($product_img_path.$product->image_2)}}" alt="Image" class="ac-cert-prv" height="150">
                                            <span class="ltn__gallery-action-icon">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </a>
                                        
                                    </div>    
                                    <p class="text-center"><button type="button" class="btn btn-link py-0 image_2_del_btn">delete</button></p>                    
                                </div>
                                <input type="hidden" name="del_image_2" id="del_image_2" value="">
                            </div>
                            <div class="col-md-3 image_3_input_div {{$product->image_3!='' ? 'd-none':''}}">
                                <div class="tm-file-choose-panel">
                                    <label><h5>Select Product Image 3</h5></label>
                                    <input type="file" class="form-control-file" name="image_3">
                                </div>
                            </div>
                            <div class="ltn__gallery-item filter_category_3 col-md-3 text-center {{$product->image_3=='' ? 'd-none':''}}">
                                <div class="ltn__gallery-item-inner">
                                    <div class="ltn__gallery-item-img">
                                        <a href="{{url($product_img_path.$product->image_3)}}" data-rel="lightcase:myCollection">
                                            <img src="{{url($product_img_path.$product->image_3)}}" alt="Image" class="ac-cert-prv" height="150">
                                            <span class="ltn__gallery-action-icon">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </a>
                                        
                                    </div>    
                                    <p class="text-center"><button type="button" class="btn btn-link py-0 image_3_del_btn">delete</button></p>                    
                                </div>
                                <input type="hidden" name="del_image_3" id="del_image_3" value="">
                            </div>
                            <div class="col-md-3 image_4_input_div {{$product->image_4!='' ? 'd-none':''}}" >
                                <div class="tm-file-choose-panel">
                                    <label><h5>Select Product Image 4</h5></label>
                                    <input type="file" class="form-control-file" name="image_4">
                                </div>
                            </div>
                            <div class="ltn__gallery-item filter_category_3 col-md-3 text-center {{$product->image_4=='' ? 'd-none':''}}">
                                <div class="ltn__gallery-item-inner">
                                    <div class="ltn__gallery-item-img">
                                        <a href="{{url($product_img_path.$product->image_4)}}" data-rel="lightcase:myCollection">
                                            <img src="{{url($product_img_path.$product->image_4)}}" alt="Image" class="ac-cert-prv" height="150">
                                            <span class="ltn__gallery-action-icon">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </a>
                                        
                                    </div>    
                                    <p class="text-center"><button type="button" class="btn btn-link py-0 image_4_del_btn">delete</button></p>                    
                                </div>
                                <input type="hidden" name="del_image_4" id="del_image_4" value="">
                            </div>
                        </div>                           
                         <div class="btn-wrapper">
                            <button class="theme-btn-1 btn reverse-color btn-block" type="submit">Submit</button>
                        </div>
                    </form>                        
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="tm-description">
                    <div class="tm-description-sort">
                        <h4>sort description</h4>
                        <p class="demo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    </div>
                    <div class="tm-description-long">
                        <h4>description</h4>
                        <p class="demo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p class="demo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div class="tm-file-choose">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="tm-file-choose-panel">
                                        <label><h5>Select Image 1</h5></label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tm-file-choose-panel">
                                        <label><h5>Select Image 2</h5></label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tm-file-choose-panel">
                                        <label><h5>Select Image 3</h5></label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tm-file-choose-panel">
                                        <label><h5>Select Image 4</h5></label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- LOGIN AREA END -->
    
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('button.image_1_del_btn').click(function(){
                // var id = $(this).attr('data-attribute');
                $(this).parents(".ltn__gallery-item").hide();
                $('.image_1_input_div').removeClass('d-none');
                $("#del_image_1").val('true');
            });
            $('button.image_2_del_btn').click(function(){
                // var id = $(this).attr('data-attribute');
                $(this).parents(".ltn__gallery-item").hide();
                $('.image_2_input_div').removeClass('d-none');
                $("#del_image_2").val('true');
            });
            $('button.image_3_del_btn').click(function(){
                // var id = $(this).attr('data-attribute');
                $(this).parents(".ltn__gallery-item").hide();
                $('.image_3_input_div').removeClass('d-none');
                $("#del_image_3").val('true');
            });
            $('button.image_4_del_btn').click(function(){
                // var id = $(this).attr('data-attribute');
                $(this).parents(".ltn__gallery-item").hide();
                $('.image_4_input_div').removeClass('d-none');
                $("#del_image_4").val('true');
            });
        });
    </script>
@endsection