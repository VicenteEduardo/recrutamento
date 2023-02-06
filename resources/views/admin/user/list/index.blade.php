@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de Utilizadores')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-10">
                        <h5><b>Lista de Utilizadores</b></h5>
                    </div>
                    <div class="col-md-2 text-center">
                        <a href="{{ route('register') }}" class="btn btn-primary">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="dataTable-1" class="table table-striped table-bordered mb-3">
                        <thead class="bg-primary thead-dark">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NOME</th>
                                <th>EMAIL</th>
                                <th>DATA DE CRIAÇÃO</th>
                                <th>NIVEL DE ACESSO</th>
                                <th class="text-left">ACÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr class="text-center text-dark">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }} </td>
                                    <td>{{ $item->email }} </td>
                                    <td>{{ $item->created_at }} </td>
                                    <td>{{ $item->level }} </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary text-white btn-sm dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa fa-navicon text-white" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href='{{ url("admin/user/show/{$item->id}") }}'
                                                    class="dropdown-item">Detalhes</a>

                                                    @if ('Administrador' != $item->level)
                                                    <a href='{{ url("admin/user/permissoes/{$item->id}") }}'
                                                        class="dropdown-item">Permissões</a>
                                                    @endif
                                                <a href='{{ url("admin/user/edit/{$item->id}") }}'
                                                    class="dropdown-item">Editar</a>
                                                <a href='{{ url("admin/user/delete/{$item->id}") }}'
                                                    class="dropdown-item">Eliminar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>

    </div>


@endsection
