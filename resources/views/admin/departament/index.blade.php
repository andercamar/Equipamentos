@extends('adminlte::page')

@section('title', 'Setor')

@section('content_header')
    <h1>Setores</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group">
                        <a href="{{route('departament.create')}}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                        </a>
                        <button type="button" id="searchButton" class="btn btn-primary" data-toggle="modal" data-target="#modalSearch" title="Buscar"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row col-sm-12"></div>
            <div class="row col-sm-12">
                <table class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departaments as $departament)
                            <tr>
                                <td>{{$departament->id}}</td>
                                <td>{{$departament->departament_name}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{route('departament.show', "$departament->id")}}">Visualizar</a></li>
                                            <li><a href="{{route('departament.edit', "$departament->id")}}">Editar</a></li>
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
        });
    </script>
@stop