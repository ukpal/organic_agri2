@extends('site.layout')

@section('content')


    

    <!-- LOGIN AREA START (Register) -->
    <div class="ltn__login-area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Register <br>Your Account</h1>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="account-login-inner">
                        <form action="{{route('register.seller')}}" enctype="multipart/form-data"  method="POST" class="ltn__form-box contact-form-box">
                            @csrf
                            <input type="text" name="name" placeholder="Full Name *">               
                            <input type="email" name="email" placeholder="Email address *">
                            <input type="text" name="tel" placeholder="Mobile Number *">
                            <input type="text" name="registered-address" placeholder="Registered Address *">                            
                            <input type="text" name="company" placeholder="Company Name">                            
                            <textarea name="additional-details" placeholder="Additional Details"></textarea>
                            <label>Attach Your Organic Certificates ( Govt. of India Approved ) *</label>
                            <input type="file" name="certificates[]" multiple class="form-control-file" id="exampleFormControlFile1">
                            <div class="btn-wrapper">
                                <button class="theme-btn-1 btn reverse-color btn-block" type="submit">Register</button>
                            </div>
                        </form>
                        <div class="by-agree text-center">
                            <p>By creating an account, you agree to our:</p>
                            <p><a href="#">TERMS OF CONDITIONS  &nbsp; &nbsp; | &nbsp; &nbsp;  PRIVACY POLICY</a></p>
                            <div class="go-to-btn mt-50">
                                <a href="{{route('login')}}">ALREADY HAVE AN ACCOUNT ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->
@endsection