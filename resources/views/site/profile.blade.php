@extends('site.layout')

@section('content')
<div class="liton__wishlist-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (Auth::user()->status=='approved')
                    <div class="ltn__team-details-area mb-90">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="ltn__team-details-member-info text-center mb-40">
                                        <div class="team-details-img">
                                            @if (Auth::user()->logo=='')
                                            <img src="{{asset('assets/site/img/logo-placeholder.jpg') }}" alt="Team Member Image">
                                            @else
                                            <img src="img/team/4.jpg" alt="Team Member Image">
                                            @endif
                                            
                                        </div>                       
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="ltn__team-details-member-info-details">
                                        <h2>{{Auth::user()->company=='' ? 'Company name': Auth::user()->company}}</h2>                        
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="ltn__team-details-member-about">
                                                    <ul>
                                                        <li><strong>Name:</strong> {{Auth::user()->name}}</li>
                                                        <li><strong>Phone:</strong> {{Auth::user()->mobile}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="ltn__team-details-member-about">
                                                    <ul>
                                                        <li><strong>Email:</strong> {{Auth::user()->email}}</li>            
                                                        <li><strong>Business Start Year:</strong> {{Auth::user()->created_at->toDateString()}}</li>            
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="ltn__team-details-member-about">
                                                    <ul>
                                                        <li><strong>Address:</strong> {{Auth::user()->address}}</li>  
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="ltn__social-media-3 mt-10">
                                                    <ul>
                                                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>                        
                                   </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="tm-seller-details mt-10">
                                        <div class="tm-seller-details-title">
                                            <h5>Additional Details</h5>
                                        </div>                        
                                        <p>{{Auth::user()->additional_details}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-20">
                                    <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                        <div class="tm-seller-details-title">
                                            <h5>products by {{Auth::user()->company=='' ? 'Company name': Auth::user()->company}}</h5>
                                        </div>
                                        <div class="row">
                                            <!-- ltn__product-item -->
                                            <div class="col-xl-3 col-sm-6 col-6">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="product-details.html"><img src="img/product/1.png" alt="#"></a>                                      
                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>                                            
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">                                       
                                                        <h2 class="product-title"><a href="product-details.html">Red Hot Tomato</a></h2>
                                                        <div class="product-price">
                                                            <span>$149.00</span>
                                                            <span>/ kg</span>
                                                        </div>
                                                        <div class="ltn__product-details-menu-3">
                                                            <ul>
                                                                <li>Seller : </li>                              
                                                                <li>                                            
                                                                    <a href="#" class="" tabindex="0">          
                                                                        <span>Vikash Sinha</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ltn__product-item -->
                                            <div class="col-xl-3 col-sm-6 col-6">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="product-details.html"><img src="img/product/2.png" alt="#"></a>
                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>                                            
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">                                       
                                                        <h2 class="product-title"><a href="product-details.html">Vegetables Juices</a></h2>
                                                        <div class="product-price">
                                                            <span>$62.00</span>
                                                            <span>/ kg</span>
                                                        </div>
                                                        <div class="ltn__product-details-menu-3">
                                                            <ul>
                                                                <li>Seller : </li>                              
                                                                <li>                                            
                                                                    <a href="#" class="" tabindex="0">          
                                                                        <span>Vikash Sinha</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ltn__product-item -->
                                            <div class="col-xl-3 col-sm-6 col-6">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="product-details.html"><img src="img/product/3.png" alt="#"></a>
                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>                                            
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">                                       
                                                        <h2 class="product-title"><a href="product-details.html">Orange Fresh Juice</a></h2>
                                                        <div class="product-price">
                                                            <span>$75.00</span>
                                                            <span>/ kg</span>
                                                        </div>
                                                        <div class="ltn__product-details-menu-3">
                                                            <ul>
                                                                <li>Seller : </li>                              
                                                                <li>                                            
                                                                    <a href="#" class="" tabindex="0">          
                                                                        <span>Vikash Sinha</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ltn__product-item -->
                                            <div class="col-xl-3 col-sm-6 col-6">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="product-details.html"><img src="img/product/4.png" alt="#"></a>
                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>                                            
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">                                       
                                                        <h2 class="product-title"><a href="product-details.html">Poltry Farm Meat</a></h2>
                                                        <div class="product-price">
                                                            <span>$78.00</span>
                                                            <span>/ kg</span>
                                                        </div>
                                                        <div class="ltn__product-details-menu-3">
                                                            <ul>
                                                                <li>Seller : </li>                              
                                                                <li>                                            
                                                                    <a href="#" class="" tabindex="0">          
                                                                        <span>Vikash Sinha</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ltn__product-item -->
                                            <div class="col-xl-3 col-sm-6 col-6">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="product-details.html"><img src="img/product/5.png" alt="#"></a>
                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>                                            
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">                                       
                                                        <h2 class="product-title"><a href="product-details.html">Fresh Butter Cake</a></h2>
                                                        <div class="product-price">
                                                            <span>$150.00</span>
                                                            <span>/ kg</span>
                                                        </div>
                                                        <div class="ltn__product-details-menu-3">
                                                            <ul>
                                                                <li>Seller : </li>                              
                                                                <li>                                            
                                                                    <a href="#" class="" tabindex="0">          
                                                                        <span>Vikash Sinha</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ltn__product-item -->
                                            <div class="col-xl-3 col-sm-6 col-6">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="product-details.html"><img src="img/product/6.png" alt="#"></a>
                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>                                            
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">                                       
                                                        <h2 class="product-title"><a href="product-details.html">Orange Sliced Mix</a></h2>
                                                        <div class="product-price">
                                                            <span>$152.00</span>
                                                            <span>/ kg</span>
                                                        </div>
                                                        <div class="ltn__product-details-menu-3">
                                                            <ul>
                                                                <li>Seller : </li>                              
                                                                <li>                                            
                                                                    <a href="#" class="" tabindex="0">          
                                                                        <span>Vikash Sinha</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ltn__product-item -->
                                            <div class="col-xl-3 col-sm-6 col-6">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="product-details.html"><img src="img/product/7.png" alt="#"></a>
                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>                                            
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">                                       
                                                        <h2 class="product-title"><a href="product-details.html">Red Hot Tomato</a></h2>
                                                        <div class="product-price">
                                                            <span>$149.00</span>
                                                            <span>/ kg</span>
                                                        </div>
                                                        <div class="ltn__product-details-menu-3">
                                                            <ul>
                                                                <li>Seller : </li>                              
                                                                <li>                                            
                                                                    <a href="#" class="" tabindex="0">          
                                                                        <span>Vikash Sinha</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ltn__product-item -->
                                            <div class="col-xl-3 col-sm-6 col-6">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="product-details.html"><img src="img/product/8.png" alt="#"></a>                                      
                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                </li>                                            
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">                                       
                                                        <h2 class="product-title"><a href="product-details.html">Vegetables Juices</a></h2>
                                                        <div class="product-price">
                                                            <span>$62.00</span>
                                                            <span>/ kg</span>
                                                        </div>
                                                        <div class="ltn__product-details-menu-3">
                                                            <ul>
                                                                <li>Seller : </li>                              
                                                                <li>                                            
                                                                    <a href="#" class="" tabindex="0">          
                                                                        <span>Vikash Sinha</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                           
                                        </div>
                                        <div class="ltn__pagination-area text-center">
                                        <div class="ltn__pagination">
                                            <ul>
                                                <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                                <li><a href="#">1</a></li>
                                                <li class="active"><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">...</a></li>
                                                <li><a href="#">10</a></li>
                                                <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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