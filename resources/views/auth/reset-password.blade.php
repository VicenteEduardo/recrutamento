@extends('layouts.merge.site')
@section('titulo', 'LOGIN')
@section('content')
<main>
    <!-- page-banner-area-start -->
    <div class="page-banner-area page-banner-height-2" data-background="Site/assets/img/banner/page-banner-4.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">
                            Minha conta</h4>
                        <div class="breadcrumb-two">
                            <nav>
                               <nav class="breadcrumb-trail breadcrumbs">
                                  <ul class="breadcrumb-menu">
                                     <li class="breadcrumb-trail">
                                        <a href="{{ route('site.home') }}"><span>Home</span></a>
                                     </li>
                                     <li class="trail-item">
                                        <span>Definir Password</span>
                                     </li>
                                  </ul>
                               </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-banner-area-end -->

    <!-- account-area-start -->
    <div class="account-area mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="basic-login mb-50">
                        <h5>Login</h5>
                        <form method="POST" class="mt-5" action="{{ route('password.update') }}">
                            @csrf
                            <!-- Session Status -->
                            <x-auth-session-status class="my-4 alert alert-success" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="my-4 alert alert-danger" :errors="$errors" />

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                            <div class="form-group">
                                <label class="label" for="email">Email</label>
                                <div class="input-group">
                                    <input class="form-control" type="email" name="email"
                                        value="{{ old('email', $request->email) }}" required autofocus>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- password  -->
                            <div class="form-group">
                                <label class="label" for="password">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <input class="form-control" id="password" type="password" name="password"
                                        required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- password_confirmation  -->
                            <div class="form-group">
                                <label class="label"
                                    for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                    <input class="form-control" id="password_confirmation"
                                        type="password" name="password_confirmation" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary submit-btn btn-block">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>

                            <div class="text-center mt-2 text-gray">
                                <small class="text-muted">Todos os Direitos Reservados ao
                                    <a href="#" target="_blank">
                                        SGCC
                                    </a>
                                    ©
                                    {{ date('Y') }}
                                </small>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- account-area-end -->

    @if (session('create'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sua conta foi criada com sucesso!',
            showConfirmButton: true
        })
    </script>
@endif

</main>
@endsection
