@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Permissões</div>

                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'PermissionController@store', 'class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nome', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Nome da permissão', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Descrição', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder'=>'Descrição da permissão', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection