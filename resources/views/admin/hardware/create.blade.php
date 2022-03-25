@extends('adminlte::page')

@section('title', 'Senhas')

@section('content_header')
    <h1>Formulario hardware</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div class="box-body">
            @if (isset($search))
                {{Form::model($search, array('route' => array('hardware.update', $search->id), 'method' => 'PUT', 'class' => 'form'))}}
            @else
                {{Form::open(array('route' => 'hardware.store', 'class' => 'form'))}}
            @endif
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            {{Form::label('hardware_type', 'Tipo')}}
                            {{Form::select('hardware_type',$type, null, array('class' => 'form-control', 'placeholder' => 'Selecione', 'id'=>'type'))}}
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2" id="model">
                            {{Form::label('hardware_model', 'Modelo')}}
                            {{Form::text('hardware_model', null, array('class' => 'form-control', 'placeholder' => 'Selecione','disabled'))}}
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            {{Form::label('hardware_specification', 'Especificação')}}
                            {{Form::text('hardware_specification',null, array('class' => 'form-control', 'placeholder' => 'Especificação'))}}
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="text-center">
                            {{Form::submit('Salvar', array('class' => 'btn btn-primary'))}}
                        </div>
                    </div>
                {{Form::close()}}
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function(){
            $('#type').ready(function(){
                var e = document.getElementById("type");
                var value = e.options[e.selectedIndex].text;
                if(value == 'Armazenamento'){
                    $('#model').html('');
                    $('#model').append('{{Form::label('hardware_model', 'Modelo')}}{{Form::select('hardware_model',$storage ,null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}');
                }else if(value == 'Memória'){
                    $('#model').html('');
                    $('#model').append('{{Form::label('hardware_model', 'Modelo')}}{{Form::select('hardware_model',$memory , null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}');
                }else if(value == 'Placa-Mãe'){
                    $('#model').html('');
                    $('#model').append('{{Form::label('hardware_model', 'Modelo')}}{{Form::text('hardware_model', null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}');
                }else if(value == 'Processador'){
                    $('#model').html('');
                    $('#model').append('{{Form::label('hardware_model', 'Modelo')}}{{Form::text('hardware_model', null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}');
                }else{
                    $('#model').html('');
                    $('#model').append('{{Form::label('hardware_model', 'Modelo')}}{{Form::text('hardware_model', null, array('class' => 'form-control', 'placeholder' => 'Selecione','disabled'))}}');
                }
            });
        });
        $('#type').change(function(){
            var e = document.getElementById("type");
            var value = e.options[e.selectedIndex].text;
            if(value == 'Armazenamento'){
                $('#model').html('');
                $('#model').append('{{Form::label('hardware_model', 'Modelo')}}{{Form::select('hardware_model',$storage ,null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}');
            }else if(value == 'Memória'){
                $('#model').html('');
                $('#model').append('{{Form::label('hardware_model', 'Modelo')}}{{Form::select('hardware_model',$memory , null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}');
            }else if(value == 'Placa-Mãe'){
                $('#model').html('');
                $('#model').append('{{Form::label('hardware_model', 'Modelo')}}{{Form::text('hardware_model', null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}');
            }else if(value == 'Processador'){
                $('#model').html('');
                $('#model').append('{{Form::label('hardware_model', 'Modelo')}}{{Form::text('hardware_model', null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}');
            }else{
                $('#model').html('');
                $('#model').append('{{Form::label('hardware_model', 'Modelo')}}{{Form::text('hardware_model', null, array('class' => 'form-control', 'placeholder' => 'Selecione','disabled'))}}');
            }
        });
    </script>
@stop