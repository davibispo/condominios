@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Solicitar Equipamento da Estaca {{$stake}}</b></div>

                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'EquipmentRentController@store', 'class'=>'form-horizontal']) !!}
                        {!! Form::hidden('status', '1') !!}
                        <div class="form-group">
                            {!! Form::label('equipment_id', 'Equipamento', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <select name="equipment_id" class="form-control">
                                    <option value=""> -- Escolha o equipamento -- </option>
                                    @foreach($equipments as $equipment)
                                    <option value="{{$equipment->id}}">{{$equipment->name}} - {{$equipment->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', 'Data de retirada', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::date('get_date', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', 'Data de devolução', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::date('return_date', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('reason_get', 'Motivo da utilização', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('reason_get', null, ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Solicitar Equipamento', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


