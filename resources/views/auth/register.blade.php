@extends('layout.guest')
@section('title','Register')
@section('content')
<section>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-12 p-0">
        <div class="login-card">
          <form method="POST" class="theme-form login-form" action="{{ route('register') }}">
            @csrf
            <h4 style="text-align: center;">Signup</h4>
            @if(Session::has('message'))
              <p style="color:green">{{ Session::get('message') }}</p>
            @endif
            <div class="form-group">
              <label for="email">Name</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                <input class="{{ $errors->has('name') ? 'form-control is-invalid':'form-control' }}" type="text" name="name" id="name" value="{{old('name')}}" autofocus placeholder="Jhon Doe">
              </div>
              @if($errors->has('name'))
                <label class="form-label text-danger" for="name">{{ $errors->first('name') }}</label>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                <input class="{{ $errors->has('user_email') ? 'form-control is-invalid':'form-control' }}" type="text" name="user_email" id="user_email" value="{{old('user_email')}}" autofocus placeholder="test@gmail.com">
              </div>
              @if($errors->has('user_email'))
                <label class="form-label text-danger" for="email">{{ $errors->first('user_email') }}</label>
              @endif
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input id="password" class="{{ $errors->has('password') ? 'is-invalid form-control':'form-control' }}" value="{{old('password')}}" type="password" name="password" autocomplete="new-password" placeholder="*********">
                <div class="show-hide"><span class="show"></span></div>
              </div>
              @if($errors->has('password'))
              <label class="form-label text-danger" for="password">{{ $errors->first('password') }}</label>
              @endif
            </div>
            <div class="form-group">
              <label for="password">Confirm Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input id="password_confirmation" class="{{ $errors->has('password_confirmation') ? 'is-invalid form-control':'form-control' }}" type="password" name="password_confirmation" autocomplete="new-password" placeholder="*********">
                <div class="show-hide"><span class="show"></span></div>
              </div> 
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">Signup</button>
            </div>
            <div class="login-social-title">
              <h5>signup with</h5>
            </div>
            <div class="form-group">
              <ul class="login-social">
                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="linkedin"></i></a></li>
                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="facebook"></i></a></li>
                <li><a href="https://www.instagram.com/login" target="_blank"><i data-feather="instagram"> </i></a></li>
              </ul>
            </div>
            <p>Already have an account?<a class="ms-2" href="{{ url('/login') }}">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection