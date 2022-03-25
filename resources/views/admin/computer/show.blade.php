@extends('adminlte::page')

@section('title', 'Computadores')

@section('content_header')
    <h1>Computadores</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <a href="{{route('computer.create')}}" class="btn btn-primary" data-toggle="tooltip" title="Adicionar"><i class="fa fa-plus"></i></a>
            <a href="{{route('computer.edit', $search->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
            @if ($search->computer_active == 1)
                <a href="{{route('computer.deactive', "$search->id")}}" class="btn btn-primary" data-toggle="tooltip" title="Desativar"><i class="fa fa-close"></i></a>
            @else
                <a href="{{route('computer.active', "$search->id")}}" class="btn btn-primary" data-toggle="tooltip" title="Ativar"><i class="fa fa-check"></i></a>
            @endif
        </div>
        <div class="box-body">
            <ul class="list-group text-center">
                <li class="list-group-item">
                    <p><b>Codigo: </b>{{$search->codTI}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Usuario: </b>{{$search->computer_user}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Setor: </b>{{$search->departament->departament_name}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Patrimonio: </b>{{$search->computer_patrimony}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Nome: </b>{{$search->computer_name}}</p>
                </li>
                @forelse ($search->licenses as $license)
                    <li class="list-group-item">
                        @if ($license->license_type== 'Sistema Operacional')
                            <p><b>Sistema Operacional: </b>{{$license->license_name}} - {{$license->license_version}}<br>
                                                        {{$license->license_key}}
                            </p>
                        @elseif ($license->license_type== 'Office')
                        <p><b>Office: </b>{{$license->license_name}} - {{$license->license_version}}<br>
                                                        {{$license->license_key}}
                        </p>
                        @else
                        @endif
                    </li>
                @empty
                @endforelse
                <li class="list-group-item">
                    <p><b>Tipo: </b>{{$search->computer_type}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Modelo: </b>{{$search->model->model_name}}</p>
                </li>
                @forelse ($search->hardware as $hardware)
                    <li class="list-group-item">
                        @if ($hardware->hardware_type == 'Armazenamento')
                            <p><b>Armazenamento: </b>{{$hardware->hardware_model}} {{$hardware->hardware_specification}}</p>
                        @elseif($hardware->hardware_type == 'Memória')
                        <p><b>Memória: </b>{{$hardware->hardware_model}} {{$hardware->hardware_specification}}</p>
                        @elseif($hardware->hardware_type == 'Processador')
                        <p><b>Processador: </b>{{$hardware->hardware_model}} {{$hardware->hardware_specification}}</p>
                        @elseif($hardware->hardware_type == 'Placa-Mãe')
                        <p><b>Placa-Mãe: </b>{{$hardware->hardware_model}} {{$hardware->hardware_specification}}</p>
                        @else

                        @endif
                    </li>
                @empty
                @endforelse
                <li class="list-group-item">
                    <p><b>Fornecedor: </b>{{$search->vendor->vendor_name}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Nota Fiscal: </b>{{$search->computer_invoice}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Comprado em: </b>{{$search->computer_purchase}}</p>
                </li>
                @if ($search->softwares)
                    @foreach ($search->softwares as $software)
                    <li class="list-group-item">
                        <p><b>Software: </b>{{$software->software_name}} - Versão: {{$software->software_version}}</p>
                    </li>
                    @endforeach
                @endif
                <li class="list-group-item">
                        <p><b>Ativo: </b>@if ($search->computer_active == 1)
                            Sim
                        @else
                            Não
                        @endif</p>
                </li>
                <li class="list-group-item">
                    <p><b>Cadastrado em: </b>{{$search->created_at}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Atualizado em: </b>{{$search->updated_at}}</p>
                </li>
            </ul>
        </div>
    </div>
@stop
