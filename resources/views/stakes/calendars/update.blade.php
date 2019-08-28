@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Editar evento do calendário da Estaca {{$stake}}</b></div>

                <div class="panel-body">
                    {!! Form::model($calendar,['method'=>'PATCH', 'action'=>['CalendarController@update', $calendar->id], 'class'=>'form-horizontal']) !!}
                   
                    {!! Form::hidden('stake', $stake) !!}
                    
                    <div class="form-group">
                        {!! Form::label('organizacao', 'Organização', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('organizacao', 
                                [
                                'Ramo' => 'Ramo',
                                'Ala' => 'Ala',
                                'Estaca' => 'Estaca', 
                                'Moças' => 'Moças', 
                                'Rapazes' => 'Rapazes', 
                                'Primária' => 'Primária', 
                                'Soc. Socorro' => 'Sociedade de Socorro', 
                                'Esc. Dominical' => 'Escola Dominical', 
                                'Ass. Públicos' => 'Assuntos Públicos', 
                                'Autossuficiência' => 'Autossuficiência', 
                                'Multiestaca' => 'Multiestaca',
                                'Mundial' => 'Mundial',
                                ], 
                                null, ['class' => 'form-control', 'placeholder' => '-- Escolha uma organização --']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('evento', 'Evento', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('evento', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('data', 'Data', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::date('data', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('horario', 'Horário', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('horario', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('local', 'Local', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('local', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('publico', 'Público alvo', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('publico', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Atualizar Evento', ['class'=>'btn btn-warning']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




