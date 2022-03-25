@extends('adminlte::page')

@section('title', 'Senhas')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="btn-group">
                <a href="{{route('users.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                </a>
            </div>

            @include('site.includes.alerts')
        </div>
        <div class="box-body">
            <div class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                            <div class="dataTables_filter">
                                    {{Form::open(array('route' => 'users.search', 'class' => 'form form-inline'))}}
                                        {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Nome'))}}
                                        {{Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email'))}}
                                        {{Form::submit('Pesquisar', array('class' => 'btn btn-primary'))}}
                                    {{Form::close()}}
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="table_user" class="table table-bordered table-striped data-table">
                            <thead>
                                <tr role="row">
                                    <th class="col-sm-1" rowspan="1" colspan="1">
                                        ID
                                    </th>
                                    <th class="col-sm-4" rowspan="1" colspan="1">
                                        Nome
                                    </th>
                                    <th class="col-sm-5" rowspan="1" colspan="1">
                                        Email
                                    </th>
                                    <th class="col-sm-2" rowspan="1" colspan="3">
                                        Opções
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr role="row" class="odd">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Editar</a></td>
                                        <td><a href="{{route('users.show', $user->id)}}" class="btn btn-primary">Consultar</a></td>
                                        <td>
                                            {{Form::open(array('route' => array('users.destroy', $user->id)))}}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Excluir', array('class' => 'btn btn-danger'))}}
                                            {{Form::close()}}
                                        </td>
                                    </tr>
                                    
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop