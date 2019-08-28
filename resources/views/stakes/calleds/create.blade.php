@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Indicar Membro para servir na Estaca {{$stake}}</b></div>

                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'CalledController@store', 'class'=>'form-horizontal']) !!}
                        {!! Form::hidden('status', '1') !!}
                    <div class="form-group">
                        {!! Form::label('called', 'Chamado', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('called', null, ['class' => 'form-control','required', 'placeholder' => 'Digite para qual chamado está indicando']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('member', 'Nome do membro', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('member', null, ['class' => 'form-control','required', 'placeholder' => 'Digite o nome do membro']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('priesthood', 'Ofício (caso se aplique)', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('priesthood', [
                                'Sacerdote'=>'Sacerdote',
                                'Élder'=>'Élder',
                                'Sumo Sacerdote'=>'Sumo Sacerdote',
                                'Bispo'=>'Bispo',
                            ], null, ['class'=>'form-control', 'placeholder'=>' -- Escolha se for o caso -- ']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('ward', 'Ala/Ramo', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('ward', null, ['class' => 'form-control','required', 'placeholder' => 'Digite a unidade do membro']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('obs', 'Observações', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            <textarea name="obs" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Enviar Indicação', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


