@extends('adminlte::page')

@section('title', 'Senhas')

@section('content_header')
    <h1 class="pull-left">Dashboard impressões</h1>
    <button id="buttonUpdate" class="btn btn-primary pull-right"><i class="fa fa-refresh"></i></button>
    <div class="clearfix"></div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-light-blue-gradient">
                <div class="inner">
                    {{Form::label('dateI', 'Data Inicial:')}}
                    {{Form::date('dateI', $firstDate, array('class' => 'form-control', 'id' => 'dateI'))}}
                </div>
                <p class="small-box-footer">Período Inicial</p>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-light-blue-gradient">
                <div class="inner">
                    {{Form::label('dateF', 'Data Final:')}}
                    {{Form::date('dateF', $lastDate, array('class' => 'form-control', 'id' => 'dateF'))}}
                </div>
                <p class="small-box-footer">Período Final</p>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-blue-gradient">
                <div class="inner">
                    <h3 id="monthPrint">0</h3>
                </div>
                <div class="icon"><i class="fa fa-file-text-o"></i></div>
                <p class="small-box-footer">Impressões totais no período</p>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3 id="colorPrint">0</h3>
                </div>
                <div class="icon"><i class="fa fa-paint-brush"></i></div>
                <p class="small-box-footer">Total de Impressões Coloridas</p>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3 id="blackPrint">0</h3>
                </div>
                <div class="icon"><i class="fa fa-pencil-square"></i></div>
                <p class="small-box-footer">Total de Impressões Preto e branca</p>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-blue-gradient">
                <div class="inner">
                    <h3 id="mostPrinter">0</h3>
                </div>
                <div class="icon"><i class="fa fa-print"></i></div>
                <p class="small-box-footer">Gasto no periodo</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Impressões por Mês - </h3>
                    <strong>ano : {{date('Y')}}</strong>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="chart">
                                <canvas id="monthChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gastos por impressora - </h3>
                    <strong>em R$</strong>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="chart">
                                <canvas id="valueChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Valores por Mês - em R$</h3>
                    <strong>ano : {{date('Y')}}</strong>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="chart">
                                <canvas id="monthValueChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Total Por Impressora</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="chart">
                                <canvas id="totalPrinterChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Quantidade e Valor por Tipo</h3>
                    <strong>em R$</strong>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="chart">
                                <canvas id="typeChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Valor por Usuario - </h3>
                    <strong>TOP 10 em R$</strong>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="chart">
                                <canvas id="peopleValueChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Quantidade de impressão por pessoa - </h3>
                    <strong>TOP 50</strong>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="chart">
                                <canvas id="peopleChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
<script src="../../adm/chart/chart.js"></script>
<script src="../../adm/blockUI/blockUI.js"></script>
<script src="../../adm/chart/myCharts.js"></script>
<script src="../../adm/chart/ajaxData.js"></script>
<script>
    $(document).ready(function(){
            $('#buttonUpdate').on('click', function(){
                ajax_dashboard_module.refreshData();
            });
    });
</script>
@stop