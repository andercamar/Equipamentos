@extends('adminlte::page')

@section('title', 'Fabricantes')

@section('content_header')
    <h1>Fabricantes</h1>
@stop

@section('content')
<div class="box box-info">
    <div class="box-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group">
                    <a href="{{route('manufacturer.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                    <button type="button" id="searchButton" class="btn btn-primary" data-toggle="modal" data-target="#modalSearch" title="Buscar"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                    @include('site.includes.alerts')
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manufacturers as $manufacturer)
                        <tr>
                            <td>{{$manufacturer->id}}</td>
                            <td>{{$manufacturer->manufacturer_name}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('manufacturer.show', "$manufacturer->id")}}">Visualizar</a></li>
                                        <li><a href="{{route('manufacturer.edit', "$manufacturer->id")}}">Editar</a></li>
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