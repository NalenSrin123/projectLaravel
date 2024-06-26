@extends('backend.master-login-register')
@section('title')
    Login
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .container-fluid{
        height: 100vh;
        background-image: url('backgorund.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .card-body{
        position: relative;
    }
    .btn-cancel{
        position: absolute;
        top:0;
        right:0px;
        padding: 5px;
        border-radius: 3px
    }
    .btn-cancel a i{
        font-size: 20px;
        color: black
    }
    .btn-cancel:hover{
        background-color: red
    }
    .btn-cancel:hover a i{
        color: #fff;
    }
</style>
@section('content')

<div class="container-fluid">
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
              <div class="card-body">
                <div class="btn-cancel">
                    <a href="{{route('getall')}}"><i class="fa-solid fa-xmark"></i></a>
                </div>
                <!-- Logo -->

                @if (Session::has('message'))
                    <p class="text-danger text-center">{{ Session::get('message') }}</p>
                @endif

                <form id="formAuthentication" class="mb-3" action="{{route('frontend-login-submit')}}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email or Username</label>
                    <input
                      type="text"
                      class="form-control"
                      id="email"
                      name="name_email"
                      placeholder="Enter your email or username"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Password</label>
                    </div>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember-me" name="remember" value="true" />
                      <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                  </div>
                  <div class="mb-3">
                    @if (Session::has('status'))
                      <small class="text-danger">Invalid Username or Password</small>
                    @endif
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                  </div>
                </form>

                <p class="text-center">
                  <span>New on our platform?</span>
                  <a href="{{route('frontend-register')}}">
                    <span>Create an account</span>
                  </a>
                </p>
              </div>
            </div>
            <!-- /Register -->
          </div>
        </div>
    </div>
</div>

@endsection
