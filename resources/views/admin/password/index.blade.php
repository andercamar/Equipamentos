@extends('adminlte::page')

@section('title', 'Senhas')

@section('content_header')
    <h1>Senhas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="btn-group">
                        <a href="{{route('password.create')}}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    @include('site.includes.alerts')
                    <div class="table-responsive">
                        <table id="table_senha" class="table table-bordered table-striped table-hover data-table" role="grid" aria-describedby="senha_info">
                            <thead>
                                <tr role="row">
                                    <th class="col-sm-3" tabindex="0" aria-controls="table_senha" rowspan="1" colspan="1">
                                        Portal
                                    </th>
                                    <th class="col-sm-2" tabindex="0" aria-controls="table_senha" rowspan="1" colspan="1">
                                        Usuario   
                                    </th>
                                    <th class="col-sm-2" tabindex="0" aria-controls="table_senha" rowspan="1" colspan="1">
                                        Senha   
                                    </th>
                                    <th class="col-sm-3" tabindex="0" aria-controls="table_senha" rowspan="1" colspan="1">
                                        Descricao
                                    </th>
                                    <th class="col-sm-2" tabindex="0" aria-controls="table_senha" rowspan="1" colspan="1">
                                        Opções
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($senhas as $senha)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$senha->portal}}</td>
                                        <td>{{$senha->usuario}}</td>
                                        <td>{{$senha->senha}}</td>
                                        <td>{{$senha->descricao}}</td>                    
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{route('password.show', "$senha->id")}}">Visualizar</a></li>
                                                    <li><a href="{{route('password.edit', "$senha->id")}}">Editar</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty      
                                @endforelse
                            </tbody>
                            <tfoot>
                                <th>Portal</th>
                                <th>Usuario</th>
                                <th>Senha</th>
                                <th>Descricao</th>
                                <th >Opções</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
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