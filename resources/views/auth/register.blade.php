@extends('layout.master2')

@section('title', 'Register')

@section('content')


    <section class="page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="page_title">
                        <h2>Register</h2>
                    </div>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{url('dashboard')}}">Home</a>/</li>
                            <li>Register</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

  <br>


  <div class="col-lg-6 col-sm-6">
      <div class="dividerHeading">
          <h4><span>Explanation</span></h4>
      </div>
      <blockquote class="default">Fill in your personal data correctly and completely.</blockquote>
      <blockquote class="default">If you already have an account, please go to through the  <a href="{{url('login')}}" class=""><b>Login</b></a> page.</blockquote>
      {{-- <blockquote class="default">Satu akun dapat menyimpan banyak rekomendasi objek wisata. </blockquote> --}}

  </div>

  <div class="col-lg-5 col-sm-5 ">
      <div class="dividerHeading">
          <h4><span>Register</span></h4>
      </div>
      <form id="signupForm" role="form" method="post" name="registerform" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="First name" required="required">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder="Last name" >
                @if ($errors->has('lastname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required="email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password 6 character minimum" value="{{ old('password') }}" required="required">
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Password confirmation " value="{{ old('password_confirmation') }}" required="required">
                  @if ($errors->has('password_confirmation'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="checkbox">
                  <label>
                      <input type="checkbox"> Remember me
                  </label>
              </div>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-default btn-lg button"><i class="fa fa-btn fa-sign-in fa-lg "></i> Register</button>
  <!--
              <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
  -->
          </div>
      </form>
  </div>

@endsection
