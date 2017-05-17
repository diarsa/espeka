@extends('layout.master2')

@section('title', 'Reset Password')
<!-- Main Content -->
@section('content')

<section class="page_head">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="page_title">
                      <h2>Reset Password</h2>
                  </div>
                  <nav id="breadcrumbs">
                      <ul>
                          <li><a href="{{url('dashboard')}}">Home</a>/</li>
                          <li>Reset Password</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>

<br>

<div class="container">
    <div class="row">
        <div class="col-md-4">
        <div class="dividerHeading">
            <h4><span>Explanation</span></h4>
        </div>
          <blockquote class="default">
            Please fill your new password and click reset password button. 
          </blockquote>
        </div>

        <div class="col-md-7">
        <div class="dividerHeading">
            <h4><span>Enter New Password</span></h4>
        </div>
            <div class="panel panel-default">
              

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required="required">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required="required">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
