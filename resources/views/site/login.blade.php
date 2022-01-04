@extends('site.layout')

@section('content')

<!-- LOGIN AREA START -->
<div class="ltn__login-area pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Sign In <br>To  Your Account</h1>                      
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="account-login-inner">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <form action="{{url('/login')}}" method="POST" class="ltn__form-box contact-form-box">
                        @csrf
                        <input type="email" name="email" placeholder="Email*">
                        <input type="password" name="password" placeholder="Password*">
                        <div class="mb-20">
                            <input type="checkbox">
                            <label class="form-check-label">Remember me</label>
                        </div>
                        <div class="btn-wrapper mt-0">
                            <button class="theme-btn-1 btn btn-block" type="submit">SIGN IN</button>
                        </div>
                        <div class="go-to-btn mt-20">
                            <a href="#"><small>FORGOTTEN YOUR PASSWORD?</small></a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="account-create text-center pt-50">
                    <h4>DON'T HAVE AN ACCOUNT?</h4>
                    <p>Add items to your wishlistget personalised recommendations <br>
                        check out more quickly track your orders register</p>
                    <div class="btn-wrapper">
                        <a href="{{route('register')}}" class="theme-btn-1 btn black-btn">CREATE ACCOUNT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN AREA END -->
    

    
@endsection