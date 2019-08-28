@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Evento do Calendário da Estaca {{$stake}}</b></div>

                <div class="panel-body">
                    <div class="form-group">
                        <b>Data: </b>{{date('d/m/Y', strtotime($calendar->data))}}
                    </div>
                    <div class="form-group">
                        <b>Horário: </b>{{$calendar->horario}}
                    </div>
                    <div class="form-group">
                        <b>Evento: </b>{{$calendar->evento}}
                    </div>
                    <div class="form-group">
                        <b>Local: </b>{{$calendar->local}}
                    </div>
                    <div class="form-group">
                        <b>Organização responsável: </b>{{$calendar->organizacao}}
                    </div>
                    <div class="form-group">
                        <b>Público alvo: </b>{{$calendar->publico}}
                    </div>

                    <div class="form-group">
                        <b>Criado em: </b>{{date('d-m-Y', strtotime($calendar->created_at))}} 
                    </div>
                    <div class="form-group">
                        <b>Atualizado em: </b>{{date('d-m-Y',strtotime($calendar->updated_at))}} 
                    </div>

                    <div class="form-group">
                        <a href="{{route('calendars.edit', $calendar->id)}}" class="btn btn-warning btn-sm">Editar</a>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['CalendarController@destroy', $calendar->id], 'style'=>'display:inline']) !!}
                        {!! Form::submit('Deletar', ['class'=>'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

