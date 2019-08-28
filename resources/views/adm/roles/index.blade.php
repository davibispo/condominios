@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Perfis</b></div>

                <div class="panel-body">

                    <div>
                        <a href="{{route('roles.create')}}" class="btn btn-default">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="perfil">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th colspan="3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->description}}</td>
                                    <td>
                                        @can('view_role', $role)
                                        <a href="{{route('roles.show', $role->id)}}" class="btn btn-info btn-xs">Show</a>
                                        @endcan
                                        @can('edit_role', $role)
                                        <a href="{{route('roles.edit', $role->id)}}" class="btn btn-warning btn-xs">Edit</a>
                                        @endcan   
                                        @can('delete_role', $role)
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['RoleController@destroy', $role->id], 'style'=>'display:inline']) !!}
                                        {!! Form::submit('Deletar', ['class'=>'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                        @endcan 
                                    </td>
                                </tr>
                                @empty
                            <div class=" well alert-warning">
                                <p>Não tem Perfis cadastrados!</p>
                            </div>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

