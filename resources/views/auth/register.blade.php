@extends('layouts.merge.dashboard')
@section('titulo', 'Criar Conta - Gestão do shazzam')
@section('content')

    <div class="card shadow">
        <div class="card-body">
            <h2 class="my-5 text-center">Criar conta no Sistema de Gestão do <b>shazzam</b></h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row align-items-center">

                <form class="col-lg-12 mt-2 col-md-12 col-12 mx-auto" method="POST" enctype="multipart/form-data"
                    action="{{ route('register') }}">
                    @include('forms._formUser.index')
                    <button class="btn btn-lg  btn-success btn-block" type="submit">{{ __('Register') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
