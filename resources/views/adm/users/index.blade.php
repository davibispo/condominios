@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><b>Usuários: {{DB::table('users')->select('id')->count()}}</b></div>

                <div class="panel-body">
                    <div>
                        <a href="{{route('users.create')}}" class="btn btn-default"><i class="fas fa-user-plus"></i></a>
                    </div>
                    <div class="perfil">
                        <table class="table table-striped" style="font-size:10px">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>Telefone</th>
                                    <th>E-mail</th>
                                    <th>Estaca</th>
                                    <th>Ala/Ramo</th>
                                    <th colspan="3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->lastname}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->stake}}</td>
                                    <td>{{$user->ward}}</td>
                                    <td>
                                        @can('view_role', $user)
                                        <a href="{{route('users.show', $user->id)}}" class="btn btn-info btn-xs">Ver</a>
                                        @endcan
                                        @can('edit_role', $user)
                                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning btn-xs">Editar</a>
                                        @endcan   
                                        @can('delete_role', $user)
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['UserController@destroy', $user->id], 'style'=>'display:inline']) !!}
                                        {!! Form::submit('x', ['class'=>'btn btn-danger btn-xs']) !!}
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

