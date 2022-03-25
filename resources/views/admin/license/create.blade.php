@extends('adminlte::page')

@section('title', 'Licenca')

@section('content_header')
    <h1>Formulario Licença</h1>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-header">
            @include('site.includes.alerts')
        </div>
        <div class="box-body">
            @if (isset($search))
                {{Form::model($search, array('route' => array('license.update', $search->id), 'method' => 'PUT', 'class' => 'form'))}}
            @else
                {{Form::open(array('route' => 'license.store', 'class' => 'form'))}}
            @endif
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            {{Form::label('license_type', 'Tipo')}}
                            {{Form::select('license_type',$type, null, array('class' => 'form-control', 'placeholder' => 'Selecione', 'id' => 'typeLicense'))}}
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-3" id="licenseName"> 
                                {{Form::label('license_name', 'Nome')}}
                                {{Form::select('license_name',['Selecione'], null, array('class' => 'form-control', 'placeholder' => 'Selecione', 'disabled'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            {{Form::label('license_version', 'Versão')}}
                            {{Form::select('license_version',$version, null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            {{Form::label('license_key', 'Chave')}}
                            {{Form::text('license_key', null, array('class' => 'form-control', 'placeholder' => 'Chave'))}}
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
            $('#typeLicense').ready(function(){
                var e = document.getElementById("typeLicense");
                var value = e.options[e.selectedIndex].text;
                if(value == 'Sistema Operacional'){
                    $('#licenseName').html('');
                    $('#licenseName').append('{{Form::label('license_name', 'Nome')}}{{Form::select('license_name',$nameW, null, array('class' => 'form-control'))}}');
                }else if(value == 'Office'){
                    $('#licenseName').html('');
                    $('#licenseName').append('{{Form::label('license_name', 'Nome')}}{{Form::select('license_name',$nameO, null, array('class' => 'form-control'))}}');
                }else{
                    $('#licenseName').html('');
                    $('#licenseName').append('{{Form::label('license_name', 'Nome')}}{{Form::select('license_name',['Selecione'], null, array('class' => 'form-control', 'disabled'))}}')
                }
            });
            $('#typeLicense').change(function(){
                var e = document.getElementById("typeLicense");
                var value = e.options[e.selectedIndex].text;
                if(value == 'Sistema Operacional'){
                    $('#licenseName').html('');
                    $('#licenseName').append('{{Form::label('license_name', 'Nome')}}{{Form::select('license_name',$nameW, null, array('class' => 'form-control'))}}');
                }else if(value == 'Office'){
                    $('#licenseName').html('');
                    $('#licenseName').append('{{Form::label('license_name', 'Nome')}}{{Form::select('license_name',$nameO, null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}');
                }else{
                    $('#licenseName').html('');
                    $('#licenseName').append('{{Form::label('license_name', 'Nome')}}{{Form::select('license_name',['Selecione'], null, array('class' => 'form-control', 'placeholder' => 'Selecione', 'disabled'))}}')
                }
            });
        });
    </script>
@stop   