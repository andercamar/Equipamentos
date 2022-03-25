<!-- @extends('adminlte::page')

@section('title', 'Impressora')

@section('content_header')
    <h1>Impressoras</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group">
                        <a href="{{route('printer.create')}}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                        </a>
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
                            <th>Nome Impressora</th>
                            <th>Impressora Colorida</th>
                            <th>Impressora A3</th>
                            <th>Valor por impressão</th>
                            <th>Ativo</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($printers as $printer)
                        <tr>
                            <td>{{$printer->printer_name}}</td>
                            <td>@if($printer->printer_color == 1)
                                    Sim
                                @else
                                    Não
                                @endif</td>
                            <td>@if($printer->printer_a3 == 1)
                                    Sim
                                @else
                                    Não
                                @endif</td>
                            <td>{{$printer->printer_value}}</td>
                            <td>@if ($printer->printer_active == 1)
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
                                        <li><a href="{{route('printer.show', "$printer->id")}}">Visualizar</a></li>
                                        <li><a href="{{route('printer.edit', "$printer->id")}}">Editar</a></li>
                                        <li>@if ($printer->printer_active == 1)
                                            <a href="{{route('printer.deactive', "$printer->id")}}">Desativar</a>
                                        @else
                                            <a href="{{route('printer.active', "$printer->id")}}">Ativar</a>
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
            $('.data-table').dataTable();
        });
    </script>
@stop -->