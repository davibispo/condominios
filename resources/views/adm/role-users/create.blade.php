@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Perfis e Usuários</b></div>

                <div class="panel-body">

                    {!! Form::open(['method'=>'POST', 'action'=>'RoleUserController@store']) !!}
                        <select name='user_id' class="form-control" required>
                            <option value=""> -- Escolha um usuário -- </option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} {{$user->lastname}} - Estaca {{$user->stake}} - Ala/Ramo {{$user->ward}}</option>
                            @endforeach
                        </select>
                        <select name='role_id' class="form-control" required>
                            <option value=""> -- Escolha um perfil -- </option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->description}}  ({{$role->name}})</option>
                            @endforeach
                        </select>
                        <br>
                        {!! Form::submit('Adicionar Perfil ao Usuário', ['class'=>'btn btn-primary btn-sm']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

