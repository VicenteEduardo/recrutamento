
@extends('layouts.merge.dashboardWithoutMenu')
@section('titulo', 'Verifique o Email')
@section('content')

    <div class="container-scroller bg-white">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper auth p-0 theme-one">
                <div class="row d-flex align-items-stretch">
                    <div class="col-md-7 banner-section d-none d-md-flex align-items-stretch justify-content-center">
                        <div class="slide-content bg-1"> </div>
                    </div>
                    <div class="col-12 col-md-5 ">
                        <div class="auto-form-wrapper align-items-center justify-content-center flex-column">

                            <a class="align-items-center justify-content-center flex-column d-flex"
                                href="{{ route('admin.home') }}">
                                <img src="/dashboard/images/digital.canvas.png" alt="Logo" width="70">
                            </a>

                            <!-- Session Status -->
                            <x-auth-session-status class="my-4 alert alert-success" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="my-4 alert alert-danger" :errors="$errors" />

                            <div class="my-4 text-sm text-gray-600">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif
                            <form method="POST" class="mt-5" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <x-button>
                                        {{ __('Resend Verification Email') }}
                                    </x-button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf


                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block">
                                        {{ __('Log Out') }}
                                    </button>
                                </div>
                            </form>
                            <div class="text-center mt-2 text-gray">
                                <small class="text-muted">Todos os Direitos Reservados ao
                                    <a href="#" target="_blank">
                                        SGCC
                                    </a>
                                    ©
                                    {{ date('Y') }}
                                </small>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

@endsection
