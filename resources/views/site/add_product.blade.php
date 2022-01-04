@extends('site.layout')

@section('content')

<!-- LOGIN AREA START -->
<div class="ltn__login-area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Add New Product</h1>                        
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="account-login-inner tm-account-login-inner">
                    <form action="{{route('product.store')}}" class="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="input-item">
                                    <select class="nice-select" name="category_id" id="category">
                                      <option>Select Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                            @foreach ($item->childrenCategories as $sub_category)
                                            <option value="{{$sub_category->id}}">--{{$sub_category->title}}</option>
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
                                <input type="text" name="name" placeholder="Product Name">  
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="quantity" placeholder="Available Quantity (Example: 8000 KG)">  
                            </div>                          
                            <div class="col-md-4">
                                <div class="tm-inline-form">
                                    <input type="text" name="price" placeholder="Price In Rupees (Example: 25000)">
                                </div>                                  
                            </div>
                            <div class="col-md-4">
                                <div class="input-item">
                                    <select class="nice-select" name="unit">
                                      <option>Select Unit</option>
                                      <option value="kg">kg</option>
                                      <option value="lt">lt</option>                              
                                      <option value="gm">gm</option>                                            
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea name="short_description" placeholder="Sort Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <textarea name="long_description" placeholder="Description"></textarea>
                            </div>
                            <div class="col-md-3">
                                <div class="tm-file-choose-panel">
                                    <label><h5>Select Product Image 1</h5></label>
                                    <input type="file" class="form-control-file" name="image_1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="tm-file-choose-panel">
                                    <label><h5>Select Product Image 2</h5></label>
                                    <input type="file" class="form-control-file" name="image_2">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="tm-file-choose-panel">
                                    <label><h5>Select Product Image 3</h5></label>
                                    <input type="file" class="form-control-file" name="image_3">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="tm-file-choose-panel">
                                    <label><h5>Select Product Image 4</h5></label>
                                    <input type="file" class="form-control-file" name="image_4">
                                </div>
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
            // $('#category').change(function(){
            //     var category_id = $(this).val();
            //     $.ajax({
            //         type: 'GET',
            //         url: "{{env('APP_URL')}}"+"seller/product/sub-categories/" + category_id,
            //         success: function(data) {
            //             $.each(data, function(i,item){
            //                 // console.log(item.title);
            //                 $('#sub_category').append('<option value="'+item.id+'">'+item.title+'</option>');
            //             });
            //         },
            //         error: function(data) {
            //             console.log(data);
            //         }
            //     });
            // });
        });
    </script>
@endsection