@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    CONSELHO DE COORDENAÇÃO MACEIÓ
                    <br>
                    <b>Calendário de Eventos</b>
                </div>

                <div class="panel-body">
                        {!! Form::model($calendar,['method'=>'POST', 'action'=>['ConselorController@calendarUpdate', $calendar->id], 'class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('org', 'Organização', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('org', 
                                [
                                'Conselho de Coordenação Maceió' => 'Conselho de Coordenação Maceió', 
                                'Assuntos Públicos' => 'Assuntos Públicos', 
                                'Templo e História da Família' => 'Templo e História da Família', 
                                'Jovens Adultos Solteiros' => 'Jovens Adultos Solteiros', 
                                'Bem-Estar' => 'Bem-Estar', 
                                'Auditoria' => 'Auditoria', 
                                'Tecnologia' => 'Tecnologia', 
                                ], 
                                null, ['class' => 'form-control','required', 'placeholder' => '-- Escolha uma organização --']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('evento', 'Evento', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('evento', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('date', 'Data', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::date('date', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('horario', 'Horário', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('horario', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('local', 'Local', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('local', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('obs', 'Observações', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('obs', null, ['class' => 'form-control']) !!}
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