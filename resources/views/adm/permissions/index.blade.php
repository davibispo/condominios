@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Permissões</b></div>

                <div class="panel-body">

                    <div>
                        <a href="{{route('permissions.create')}}" class="btn btn-default"><i class="fas fa-plus"></i></a>
                    </div>
                    <div class="perfil">
                        <table class="table table-striped" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th colspan="3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permissions as $permission)
                                <tr>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->description}}</td>
                                    <td>
                                        @can('view_role', $permission)
                                        <a href="{{route('permissions.show', $permission->id)}}" class="btn btn-info btn-xs">Ver</a>
                                        @endcan
                                        @can('edit_role', $permission)
                                        <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-warning btn-xs">Edit</a>
                                        @endcan   
                                        @can('delete_role', $permission)
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['PermissionController@destroy', $permission->id], 'style'=>'display:inline']) !!}
                                        {!! Form::submit('x', ['class'=>'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                        @endcan 
                                    </td>
                                </tr>
                                @empty
                            <div class=" well alert-warning">
                                <p>Não tem Permissões cadastrados!</p>
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

