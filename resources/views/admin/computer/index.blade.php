@extends('adminlte::page')

@section('title', 'Computador')

@section('content_header')
    <h1>Computadores</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group">
                        <a href="{{route('computer.create')}}" class="btn btn-primary">
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
                            <th>Patrimonio</th>
                            <th>Codigo TI</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Modelo</th>
                            <th>Usuario</th>
                            <th>Setor</th>
                            <th>Ativo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @forelse ($computers as $computer)
                        <tr>
                            <td>{{$computer->computer_patrimony}}</td>
                            <td>{{$computer->codTI}}</td>
                            <td>{{$computer->computer_name}}</td>
                            <td>{{$computer->computer_type}}</td>  
                            <td>{{$computer->model->model_name}}</td> 
                            <td>{{$computer->computer_user}}</td>
                            <td>{{$computer->departament->departament_name}}</td>
                            <td>@if ($computer->computer_active == 1)
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
                                        <li><a href="{{route('computer.show', "$computer->id")}}">Visualizar</a></li>
                                        <li><a href="{{route('computer.edit', "$computer->id")}}">Editar</a></li>
                                        <li>@if ($computer->computer_active == 1)
                                            <a href="{{route('computer.deactive', "$computer->id")}}">Desativar</a>
                                        @else
                                            <a href="{{route('computer.active', "$computer->id")}}">Ativar</a>
                                        @endif</li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function(){
            var table = $('.data-table').DataTable();
            $('#checkActive').change(function(){
                var check = $('#checkActive').is(':checked');
                if (check) {
                    $('#tbody').html('');
                    $('#tbody').append('@forelse ($computersD as $computer)'+
                        '<tr><td>{{$computer->computer_patrimony}}</td>'+
                            '<td>{{$computer->codTI}}</td>'+
                            '<td>{{$computer->computer_name}}</td>'+
                            '<td>{{$computer->computer_type}}</td>'+
                            '<td>{{$computer->model->model_name}}</td>'+ 
                            '<td>{{$computer->computer_user}}</td>'+
                            '<td>{{$computer->departament->departament_name}}</td>'+
                            '<td>{{($computer->computer_active == 1)?"Sim":"Não"}}'+
                            '</td><td>'+
                                '<div class="btn-group">'+
                                    '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">'+
                                       '<span class="caret"></span>'+
                                    '</button>'+
                                    '<ul class="dropdown-menu">'+
                                        '<li><a href="{{route('computer.show', "$computer->id")}}">Visualizar</a></li>'+
                                        '<li><a href="{{route('computer.edit', "$computer->id")}}">Editar</a></li>'+
                                        '<li>@if ($computer->computer_active == 1)'+
                                            '<a href="{{route('computer.deactive', "$computer->id")}}">Desativar</a>'+
                                        '@else'+
                                            '<a href="{{route('computer.active', "$computer->id")}}">Ativar</a>'+
                                        '@endif</li>'+
                                    '</ul>'+
                                '</div>'+
                            '</td>'+
                        '</tr>'+
                        '@empty'+
                        '@endforelse');
                } else {
                    $( "#mytable" ).load( "your-current-page.html #mytable" );
                    $('#tbody').html('');
                    $('#tbody').append('@forelse ($computers as $computer)'+
                        '<tr><td>{{$computer->computer_patrimony}}</td>'+
                            '<td>{{$computer->codTI}}</td>'+
                            '<td>{{$computer->computer_name}}</td>'+
                            '<td>{{$computer->computer_type}}</td>'+
                            '<td>{{$computer->model->model_name}}</td>'+ 
                            '<td>{{$computer->computer_user}}</td>'+
                            '<td>{{$computer->departament->departament_name}}</td>'+
                            '<td>{{($computer->computer_active == 1)?"Sim":"Não"}}'+
                            '</td><td>'+
                                '<div class="btn-group">'+
                                    '<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">'+
                                       '<span class="caret"></span>'+
                                    '</button>'+
                                    '<ul class="dropdown-menu">'+
                                        '<li><a href="{{route('computer.show', "$computer->id")}}">Visualizar</a></li>'+
                                        '<li><a href="{{route('computer.edit', "$computer->id")}}">Editar</a></li>'+
                                        '<li>@if ($computer->computer_active == 1)'+
                                            '<a href="{{route('computer.deactive', "$computer->id")}}">Desativar</a>'+
                                        '@else'+
                                            '<a href="{{route('computer.active', "$computer->id")}}">Ativar</a>'+
                                        '@endif</li>'+
                                    '</ul>'+
                                '</div>'+
                            '</td>'+
                        '</tr>'+
                        '@empty'+
                        '@endforelse');
                }
            });
        });
    </script>
@stop