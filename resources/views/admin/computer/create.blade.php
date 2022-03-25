@extends('adminlte::page')

@section('title', 'Computadores')

@section('content_header')
    <h1>Formulario fabricante: <b>{{$search->computer_name or 'Novo'}}</b></h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div id="_body" class="box-body">
            @if (isset($search))
                {{Form::model($search, array('route' => array('computer.update', $search->id), 'method'=>'PUT', 'class' => 'form')) }}
            @else
                {{Form::open(array('route' => 'computer.store', 'class' => 'form'))}}
            @endif
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                                {{Form::label('computer_patrimony', 'Patrimonio')}}
                                {{Form::number('computer_patrimony', null, array('class' => 'form-control', 'placeholder' => 'Patrimonio' ))}}
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            {{Form::label('computer_type', 'Tipo')}}
                            {{Form::select('computer_type',$type ,null, array('class' => 'form-control', 'placeholder' => 'Tipo', 'id'=> 'typeComputer'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                                {{Form::label('computer_name', 'Nome do Computador')}}
                                {{Form::text('computer_name', null, array('class' => 'form-control', 'placeholder' => 'Nome' ))}}
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                                {{Form::label('codTI', 'Codigo TI')}}
                                {{Form::number('codTI', null, array('class' => 'form-control', 'placeholder' => 'Nome' ))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            {{Form::label('computer_user', 'Usuario ')}}
                            {{Form::text('computer_user', null, array('class' => 'form-control', 'placeholder' => 'Usuario' ))}}
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            {{Form::label('departament_id', 'Setor')}}
                            {{Form::select('departament_id',$departament ,null, array('class' => 'form-control', 'placeholder' => 'Setor' ))}}
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2" id="">
                            {{Form::label('model_id', 'Modelo')}}
                            {{Form::select('model_id',$modelDesktop, null, array('class' => 'form-control', 'style'=> 'display:none', 'id' => 'modelDesk'))}}
                            {{Form::select('model_id',$modelNotebook, null, array('class' => 'form-control','style'=> 'display:none', 'id' => 'modelNot'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                                {{Form::label('computer_invoice', 'Nota Fiscal')}}
                                {{Form::number('computer_invoice', null, array('class' => 'form-control', 'placeholder' => 'Nota Fiscal' ))}}
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                                {{Form::label('vendor_id', 'Fornecedor')}}
                                {{Form::select('vendor_id',$vendor ,null, array('class' => 'form-control', 'placeholder' => 'Fornecedor' ))}}
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            {{Form::label('computer_purchase', 'Data de compra')}}
                            {{Form::date('computer_purchase',null, array('class' => 'form-control', 'placeholder' => 'Setor' ))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            {{Form::label('motherboard_id', 'Placa Mãe')}}
                            {{Form::select('motherboard_id',$motherboard ,null, array('class' => 'form-control', 'placeholder' => 'Placa Mãe' ))}}
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            {{Form::label('memory_id', 'Memória')}}
                            {{Form::select('memory_id',$memory ,null, array('class' => 'form-control', 'placeholder' => 'Memória' ))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            {{Form::label('processor_id', 'Processador')}}
                            {{Form::select('processor_id',$processor ,null, array('class' => 'form-control', 'placeholder' => 'Processador' ))}}
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            {{Form::label('storage_id', 'Armazenamento')}}
                            {{Form::select('storage_id',$storage ,null, array('class' => 'form-control', 'placeholder' => 'Armazenamento' ))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                                {{Form::label('system_id', 'Sistema Operacional')}}
                                {{Form::select('system_id',$System ,null, array('class' => 'form-control', 'placeholder' => 'Sistema Operacional' ))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                                {{Form::label('office_id', 'Office')}}
                                {{Form::select('office_id',$Office ,null, array('class' => 'form-control', 'placeholder' => 'Office' ))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                                {{Form::label('software_id', 'Softwares')}}
                                {{Form::select('software_id',$Software ,null, array('class' => 'form-control', 'placeholder' => 'Softwares' ))}}
                        </div>
                        <div class="col-md-4">
                            {{-- <label id="addS" class="btn btn-primary" onclick="addSoftware()"><i class="fa fa-plus"></i></label> --}}
                        </div>
                    </div>
        </div>
        <div class="box-footer">
                <div class="text-center">
                    {{Form::submit('Salvar', array('class' => 'btn btn-primary'))}}
                </div>
            {{Form::close()}}
        </div>
    </div>
@stop
@section('js')
    <script>
        function addSoftware(){
            $('#_body').append("<div class='row'><div class='col-md-2'></div>"+
                                "<div class='col-md-6'>"+
                                '{{Form::label('software_id', 'Softwares')}}'+
                                '{{Form::select('software_id',$Software ,null, array('class' => 'form-control', 'placeholder' => 'Softwares' ))}}'+
                                "</div></div>");
        }
        $(document).ready(function(){
            $('#typeComputer').ready(function(){
                var e = document.getElementById("typeComputer");
                var d = document.getElementById("modelDesk");
                var n = document.getElementById("modelNot");
                var value = e.options[e.selectedIndex].text;
                if(value == 'Desktop'){
                    d.style.display = 'block';
                    n.style.display = 'none';
                    n.value = 0;
                }else if(value == 'Notebook'){
                    n.style.display = 'block';
                    d.style.display = 'none';
                    d.value = 0;
                }else{
                    n.style.display = 'none';
                    d.style.display = 'none';
                }
            });
            $('#typeComputer').change(function(){
                var e = document.getElementById("typeComputer");
                var d = document.getElementById("modelDesk");
                var n = document.getElementById("modelNot");
                var value = e.options[e.selectedIndex].text;
                if(value == 'Desktop'){
                    d.style.display = 'block';
                    n.style.display = 'none';
                    n.value = 0;
                }else if(value == 'Notebook'){
                    n.style.display = 'block';
                    d.style.display = 'none';
                    d.value = 0;
                }else{
                    n.style.display = 'none';
                    d.style.display = 'none';
                }
            });
        });
    </script>
@stop
