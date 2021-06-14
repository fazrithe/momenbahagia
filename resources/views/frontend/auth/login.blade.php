@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')
      <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-6 pt-lg-4">
      <div class="container">
        <div class="header-body text-center">
              <h1 class="text-white">Welcome!</h1>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center">
                <a href="{{ route('frontend.auth.social.login', 'google') }} " class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                    <span class="btn-inner--text">Google</span>
                  </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
              </div>
              <x-forms.post :action="route('frontend.auth.login')">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input name="remember" id="remember" class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} />

                            <label class="form-check-label" for="remember">
                                @lang('Remember Me')
                            </label>
                        </div><!--form-check-->
                    </div>
                </div><!--form-group-->
                @if(config('boilerplate.access.captcha.login'))
                <div class="row">
                    <div class="col">
                        @captcha
                        <input type="hidden" name="captcha_status" value="true" />
                    </div><!--col-->
                </div><!--row-->
               @endif
                <div class="text-center">
                  <button class="btn btn-primary my-4" type="submit">@lang('Login')</button>
                </div>
            </x-forms.post>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
                <a href="{{ route('frontend.auth.password.request') }}" class="text-light"><small>Forgot Password</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="{{ route('frontend.auth.register') }}" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
