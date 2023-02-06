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
                            Esqueceu a sua Senha?</h4>
                        <div class="breadcrumb-two">
                            <nav>
                               <nav class="breadcrumb-trail breadcrumbs">
                                  <ul class="breadcrumb-menu">
                                     <li class="breadcrumb-trail">
                                        <a href="{{ route('site.home') }}"><span>Home</span></a>
                                     </li>
                                     <li class="trail-item">
                                        <span>Esqueceu a sua Senha?</span>
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
                        <h5>Digite seu email para recuperação de senha</h5>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <x-auth-session-status class="mb-4 alert alert-info" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
                            <label for="name">Email <span>*</span></label>
                            <input id="name" type="email" name="email" :value="old('email')" placeholder="email">



                    <x-button class="tp-in-btn w-100">
                        {{ __('Log in') }}
                    </x-button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- account-area-end -->



</main>
@endsection
