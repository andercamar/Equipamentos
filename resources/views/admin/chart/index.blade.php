@extends('adminlte::page')

@section('title', 'Senhas')

@section('content_header')
    <h1>Dashboard impressões</h1>
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
                <h3>{{$printerReport->monthPrint($firstDate,$lastDate)}}</h3>
            </div>
            <div class="icon"><i class="fa fa-file-text-o"></i></div>
            <p class="small-box-footer">Impressões totais no período</p>
        </div>
    </div>
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$printerReport->colorPrint($printer->returnPrinterColor(TRUE),$firstDate,$lastDate)}}</h3>
            </div>
            <div class="icon"><i class="fa fa-paint-brush"></i></div>
            <p class="small-box-footer">Total de Impressões Coloridas</p>
        </div>
    </div>
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-gray">
            <div class="inner">
                <h3>{{$printerReport->colorPrint($printer->returnPrinterColor(FALSE),$firstDate,$lastDate)}}</h3>
            </div>
            <div class="icon"><i class="fa fa-pencil-square"></i></div>
            <p class="small-box-footer">Total de Impressões Preto e branca</p>
        </div>
    </div>
    <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-blue-gradient">
            <div class="inner">
                <h3>{{$printer->returnPrinter($printerReport->mostPrinter($firstDate,$lastDate))['printer_name']}}</h3>
            </div>
            <div class="icon"><i class="fa fa-print"></i></div>
            <p class="small-box-footer">Impressora com mais Impressão</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@stop