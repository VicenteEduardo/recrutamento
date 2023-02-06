@extends('layouts.merge.dashboard')
@section('titulo', ' Detalhes do Utilizador')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h4 mb-4 page-title">{{ $user->name }}</h2>
                        <div class="row mt-5 align-items-center">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="{{ $user->photo }}" alt="profile image" width="200">
                                <div class="wrapper ps-2 mx-5">
                                    <p class="mb-0 text-gray"><b> Email:</b> {{ $user->email }}</p>



                                    <p class="mb-0 text-gray"><b>Telefone Principal:</b>
                                        {{ $CustomerAccount->phone_number }}</p>
                                    @if ($CustomerAccount->CustomerAccount)
                                        <p class="mb-0 text-gray"><b>Telefone Secundario:</b>
                                            {{ $CustomerAccount->CustomerAccount }}</p>
                                    @endif


                                    <p class="mb-0 text-gray"><b> NIF:</b> {{ $CustomerAccount->nif }}</p>
                                    <p class="mb-0 text-gray"><b>Data de Criação:</b> {{ $user->created_at }}</p><br>
                                    <h5> <a target="_blank" href="{{ $CustomerAccount->alvara }}">Anexo do Alvará
                                            da sua empresa</a> </h5>

                                    <small class="mb-0 text-muted">{{ $user->level }}</small><br>

                                    @if ($user->status == 'Aguardando Validação')
                                        <div class="btn btn-danger btn-fw btn-rounded text-white ">
                                            {{ $user->status }}</div>
                                    @else
                                        <div class="btn btn-success btn-fw btn-rounded text-dark ">
                                            {{ $user->status }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 text-center mb-5">
                                <div class=" ml-5" style="height: 150px; width:150px;">
                                    <img src="" alt="">
                                </div>
                            </div>

                        </div>



                    </div> <!-- /.col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->


        </div>
    </div>


    <div class="section-body mt-4">

        <div class="card shadow mb-4">
            <div class="card-body">

                <h4 class="mt-3 mb-5 text-left"><b>Registo de Actividades</b></h4>

                <div class="table-responsive">
                    <table id="dataTable-1" class="table table-striped table-bordered mb-3">
                        <thead class="bg-primary thead-dark">
                            <tr class="text-center">
                                <th>ID</th>
                                <th class="text-left">CAMINHO</th>
                                <th>IP</th>
                                <th class="text-left">MENSAGEM</th>
                                <th class="text-center">DATA</th>
                                {{-- <th>ACÇÕES</th> --}}
                            </tr>
                        </thead>
                        <tbody class="bg-white">

                            @foreach ($logs as $item)
                                <tr class="text-center text-dark">
                                    <td>{{ $item->id }}</td>
                                    <td class="text-left">{{ $item->PATH_INFO }} </td>
                                    <td>{{ $item->REMOTE_ADDR }} </td>
                                    <td class="text-left">{{ $item->message }} </td>
                                    <td>{{ $item->created_at }} </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>




@endsection
