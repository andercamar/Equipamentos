@extends('adminlte::page')

@section('title', 'Senhas')

@section('content_header')
    <h1 class="title">Senha: <b>{{$senha->portal}}</b></h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
                <div class="btn-group">
                    <a href="{{route('password.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                    <a href="{{route('password.edit', $senha->id)}}" class="btn btn-primary">
                        <i class="fa fa-pencil"></i> 
                    </a>
                    {{Form::open(array('url' => 'admin/password/' . $senha->id, 'class' => 'pull-right'))}}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit','type' => 'button', 'class' => 'btn btn-primary'))}}
                    {{Form::close()}}
                </div>
        </div>
        <div class="box-body">
            <ul class="list-group list-group-unbordered text-center">
                <li class="list-group-item">
                    <p><b>Portal:</b>{{$senha->portal}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Usuario:</b>{{$senha->usuario}}</p>
                </li>
                <li class="list-group-item">
                    <p><b>Senha:</b>{{$senha->senha}}</p>
                </li>
                <li>
                    <p><b>Ativo:</b>@if ($senha->exclusao==0)
                        Sim
                    @else
                        Não
                    @endif</p>
                </li>
                <li class="list-group-item">
                    <p><b>Descrição:</b>{{$senha->descricao}}</p>
                </li>
            </ul>
        </div>
    </div>    
@endsection