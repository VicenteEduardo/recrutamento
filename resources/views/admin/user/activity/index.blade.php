@extends('layouts.merge.dashboard')
@section('titulo', ' Registo de Actividades')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5><b>Registo de Actividades</b></h5>
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
                            <th>ID</th>
                            <th class="text-left">CAMINHO</th>
                            <th>IP</th>
                            <th class="text-left">MENSAGEM</th>
                            <th class="text-center">DATA</th>
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
