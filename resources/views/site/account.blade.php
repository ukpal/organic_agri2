@extends('site.layout')

@section('style')
    <style>
        .ac-cert-prv{
            height: 150px;
            width: 150px;
        }
    </style>
@endsection

@section('content')
<div class="liton__wishlist-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (Auth::user()->status=='approved')
                    <!-- PRODUCT TAB AREA START -->
                <div class="ltn__product-tab-area">
                    <div class="container">
                        <div class="row">                                
                            <div class="col-lg-4">
                                <div class="ltn__tab-menu-list mb-50">
                                    <div class="nav">
                                        <!-- <a class="active show" data-toggle="tab" href="#liton_tab_1_1">Dashboard <i class="fas fa-home"></i></a> -->
                                        <a data-toggle="tab" href="#liton_tab_1_2" class="active show">Products <i class="fas fa-file-alt"></i></a>
                                        <!-- <a data-toggle="tab" href="#liton_tab_1_3">Downloads <i class="fas fa-arrow-down"></i></a> -->                       
                                        <a data-toggle="tab" href="#liton_tab_1_5">Account Details <i class="fas fa-user"></i></a>
                                        <a data-toggle="tab" href="#liton_tab_1_4">Social Details <i class="fas fa-share-alt"></i></a>
                                        <a data-toggle="tab" href="#liton_tab_1_6">Change Password <i class="fas fa-key"></i></a>
                                        <a data-toggle="tab" href="#liton_tab_1_7">Logo <i class="fas fa-image"></i></a>
                                        <a href="{{route('logout')}}">Logout <i class="fas fa-sign-out-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">                                   
                            
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="liton_tab_1_1">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <p>Hello <strong>UserName</strong> (not <strong>UserName</strong>? <small><a href="login-register.html">Log out</a></small> )</p>
                                            <p>From your account dashboard you can view your <span>recent orders</span>, manage your <span>shipping and billing addresses</span>, and <span>edit your password and account details</span>.</p>
                                        </div>
                                    </div>                                        
                                    <div class="tab-pane fade active show" id="liton_tab_1_2">
                                        <div class="tm-account-btn">
                                            <ul>
                                                <li><a href="{{route('product.add')}}" class="theme-btn-1 btn btn-effect-1 text-uppercase" tabindex="0">Add New Products</a></li>
                                                <li><a href="#" class="tm-theme-btn-1 theme-btn-1 btn btn-effect-1 text-uppercase" tabindex="0">Delete Selected</a></li>
                                            </ul>
                                        </div>
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" class="mr-1"> Select</th>
                                                            <th>Product Name</th>                     
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($products as $item)
                                                        <tr>
                                                            <td><input type="checkbox"></td>
                                                            <td><a href="#">{{$item->name}}</a></td>                      
                                                            <td class="{{$item->status=='pending' ? 'text-warning':''}}
                                                                {{$item->status=='approved' ? 'text-success':''}}
                                                                {{$item->status=='declined' ? 'text-danger':''}}">{{$item->status}}</td>
                                                            <td><a href="{{url('seller/product/edit/'.$item->id)}}">View / Edit</a></td>
                                                        </tr>
                                                        @endforeach
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane fade" id="liton_tab_1_3">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Date</th>
                                                            <th>Expire</th>
                                                            <th>Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Carsafe - Car Service PSD Template</td>
                                                            <td>Nov 22, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Carsafe - Car Service HTML Template</td>
                                                            <td>Nov 10, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Carsafe - Car Service WordPress Theme</td>
                                                            <td>Nov 12, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="tab-pane fade" id="liton_tab_1_4">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <!-- <p>The following addresses will be used on the checkout page by default.</p> -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="ltn__form-box">
                                                        <form action="{{route('socialAccount.update')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$socials->id}}">
                                                            <div class="row mb-20">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="fb" placeholder="Facebook URL" value="{{$socials->facebook}}">   
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="twitter" placeholder="Twitter URL" value="{{$socials->twitter}}">   
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="linkedin" placeholder="Linkedin url" value="{{$socials->linkedin}}">
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="google" placeholder="Google URL" value="{{$socials->google}}">   
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="youtube" placeholder="Youtube URL" value="{{$socials->youtube}}">   
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="pinterest" placeholder="Pinterest URL" value="{{$socials->pinterest}}">   
                                                                </div>
                                                            </div>
                                                            <div class="btn-wrapper">
                                                                <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Submit Now</button>
                                                            </div>                                   
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_5">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <!-- <p>The following addresses will be used on the checkout page by default.</p> -->
                                            <div class="ltn__form-box">
                                                <form action="{{route('account.update')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <div class="row mb-50">
                                                        <div class="col-md-6">
                                                            <input type="text" name="company" placeholder="Company Name *" value="{{$user->company}}">   
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" name="name" placeholder="Full Name *" value="{{$user->name}}">   
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="email" name="email" placeholder="Email address *" value="{{$user->email}}" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" name="tel" placeholder="Mobile Number *" value="{{$user->mobile}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" name="address" placeholder="Registered Address *" value="{{$user->address}}"> 
                                                        </div>
                                                        <div class="col-md-12">
                                                            <textarea name="additional-details" placeholder="Additional Details">{{$user->additional_details}}</textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Add Your Organic Certificates ( Govt. of India Approved ) *</label>
                                                            <input type="file" name="certificates[]" multiple  >
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h4>Uploaded Certificates</h4>
                                                            <div class="tm-ltn__gallery-active ltn__gallery-active row ltn__gallery-style-2 ltn__gallery-info-hide---">
                                                                <div class="ltn__gallery-sizer col-1"></div>

                                                                @php
                                                                    $certificates = json_decode($user->certificates);
                                                                    // print_r( $certificates);
                                                                @endphp
                                                                @foreach ($certificates as $item)
                                                                <div class="ltn__gallery-item filter_category_3 col-md-3" id="{{'ci'.$item}}">
                                                                    <div class="ltn__gallery-item-inner">
                                                                        <div class="ltn__gallery-item-img">
                                                                            <a href="{{$certificate_path.$item}}" data-rel="lightcase:myCollection">
                                                                                <img src="{{$certificate_path.$item}}" alt="Image" class="ac-cert-prv">
                                                                                <span class="ltn__gallery-action-icon">
                                                                                    <i class="fas fa-search"></i>
                                                                                </span>
                                                                            </a>
                                                                            
                                                                        </div>    
                                                                        <p class="text-center"><button type="button" data-attribute="{{$item}}" class="btn btn-link py-0 del-cert-btn">delete</button></p>                    
                                                                        {{-- <p class="text-center"><button type="button" class="btn btn-link py-0 del-cert-btn" onclick="deleteCertificate('{{$item}}')">delete</button></p>                     --}}
                                                                    </div>
                                                                </div>
                                                                @endforeach

                                                                
                                                                               
                                                            </div>
                                                        </div>
                                                    </div>                                                  
                                                    <div class="btn-wrapper">
                                                        <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_6">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <!-- <p>The following addresses will be used on the checkout page by default.</p> -->
                                            <div class="ltn__form-box">
                                                <form action="{{route('password.update')}}" method="POST">
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    @csrf                                                   
                                                    <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Current password (leave blank to leave unchanged):</label>
                                                                <input type="password" name="current_pass">
                                                                <label>New password (leave blank to leave unchanged):</label>
                                                                <input type="password" name="new_pass">
                                                                <label>Confirm new password:</label>
                                                                <input type="password" name="confirm_pass">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="btn-wrapper">
                                                        <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT TAB AREA END -->
                @else
                    <h1 class="text-center text-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                        <u>You are not allowed to this page</u></h1>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        // function deleteCertificate(image){
        //     document.getElementById('#ci'+image).style.display = "none";
        // }
        $(document).ready(function(){
            $('button.del-cert-btn').click(function(){
                var imgName = $(this).attr('data-attribute');
                $(this).parents(".ltn__gallery-item").hide();
                // $(this).parents(".ltn__gallery-item").css({"visibility": "hidden"});
                $.ajax({
                    type: 'GET',
                    url: "{{env('APP_URL')}}"+"seller/certificate/delete/" + imgName,
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection