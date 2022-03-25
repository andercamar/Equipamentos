@extends('adminlte::page')

@section('title', 'Licenças ')

@section('content_header')
    <h1>Licenças</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <div class="col-sm-12">
                <div class="row">
                    <div class="btn-group">
                        <a href="{{route('license.create')}}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                        </a>
                        <button type="button" id="searchButton" class="btn btn-primary" data-toggle="modal" data-target="#modalSearch" title="Buscar"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="box-tools pull-right">
                        {{Form::label('active','Mostrar Desativados')}}
                        {{Form::checkbox('active','active',false,array('id' => 'checkActive'))}}
                    </div>
                </div>
                
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Nome</th>
                            <th>Versão</th>
                            <th>Chave</th>
                            <th>Criado em</th>
                            <th>Ativo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id='tbody'>
                        @foreach ($licensesA as $license)
                        <tr>
                            <td>{{$license->id}}</td>
                            <td>{{$license->license_type}}</td>
                            <td>{{$license->license_name}}</td>
                            <td>{{$license->license_version}}</td>
                            <td>{{$license->license_key}}</td>
                            <td>{{$license->created_at}}</td>  
                            <td>@if ($license->license_active == 1)
                                Sim
                            @else
                                Não
                            @endif</td>  
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('license.show', "$license->id")}}">Visualizar</a></li>
                                        <li><a href="{{route('license.edit', "$license->id")}}">Editar</a></li>
                                        <li>@if ($license->license_active == 1)
                                            <a href="{{route('license.deactive', "$license->id")}}">Desativar</a>
                                        @else
                                            <a href="{{route('license.active', "$license->id")}}">Ativar</a>
                                        @endif</li>
                                    </ul>
                                </div>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function(){
            $('.data-table').dataTable();
            $('#checkActive').change(function(){
                var check = $('#checkActive').is(':checked');
                if (check) {
                    $('#tbody').html('');
                    $('#tbody').append('@foreach ($licensesD as $license)<tr><td>{{$license->id}}</td><td>{{$license->license_type}}</td><td>{{$license->license_name}}</td><td>{{$license->license_version}}</td><td>{{$license->license_key}}</td><td> @if ($license->license_active == 1) Sim @else Não @endif</td><td>{{$license->created_at}}</td><td><div class="btn-group"><button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu"><li><a href="{{route('license.show', "$license->id")}}">Visualizar</a></li><li><a href="{{route('license.edit', "$license->id")}}">Editar</a></li><li>@if ($license->license_active == 1)<a href="{{route('license.deactive', "$license->id")}}">Desativar</a>@else<a href="{{route('license.active', "$license->id")}}">Ativar</a>@endif</li></ul> </div></td></tr>@endforeach');
                } else {
                    $('#tbody').html('');
                    $('#tbody').append('@foreach ($licensesA as $license)<tr><td>{{$license->id}}</td><td>{{$license->license_type}}</td><td>{{$license->license_name}}</td><td>{{$license->license_version}}</td><td>{{$license->license_key}}</td><td> @if ($license->license_active == 1) Sim @else Não @endif</td><td>{{$license->created_at}}</td><td><div class="btn-group"><button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button><ul class="dropdown-menu"><li><a href="{{route('license.show', "$license->id")}}">Visualizar</a></li><li><a href="{{route('license.edit', "$license->id")}}">Editar</a></li><li>@if ($license->license_active == 1)<a href="{{route('license.deactive', "$license->id")}}">Desativar</a>@else<a href="{{route('license.active', "$license->id")}}">Ativar</a>@endif</li></ul> </div></td></tr>@endforeach');
                }
            });
        });
    </script>
@stop