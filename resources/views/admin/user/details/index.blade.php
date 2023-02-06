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
                                    <p class="mb-0 text-gray">Email: {{ $user->email }}</p>
                                    <p class="mb-0 text-gray">Data de Criação: {{ $user->created_at }}</p>
                                    <p class="mb-0 text-gray">Tipo de Utilizador: {{ $user->level }}</p>


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
