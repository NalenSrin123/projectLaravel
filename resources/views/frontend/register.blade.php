@extends('backend.master-login-register')
@section('title')
    Register
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .container-fluid{
        height: 100vh;
        background-image: url('back1.jpg');
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
                @if (Session::has('message'))
                    <p class="text-danger text-center">{{ Session::get('message') }}</p>
                @endif

                <form id="formAuthentication" class="mb-3" action="{{route('frontend-register-submit')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input
                      type="text"
                      class="form-control"
                      id="username"
                      name="name"
                      placeholder="Enter your username"
                      autofocus
                    />
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
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
                    <label class="form-label">Profile</label>
                    <input type="file" class="form-control" name="profile" >
                  </div>

                  <button class="btn btn-primary d-grid w-100">Sign up</button>
                </form>

                <p class="text-center">
                  <span>Already have an account?</span>
                  <a href="{{route('frontend-login')}}">
                    <span>Sign in instead</span>
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
