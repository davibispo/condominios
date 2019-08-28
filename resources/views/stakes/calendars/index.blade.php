@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Calendário da Estaca {{$stake}} - {{ date('Y') }}</b></div>

                <div class="panel-body">
                    <div>
                        @can('calendar_create')    
                        <a href="{{route('calendars.create')}}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Adicionar Evento
                        </a>
                        @endcan
                        <a href="{{route('calendars.print.imprimir')}}" target="_blank" class="btn btn-default btn-sm">
                            <i class="fas fa-print"></i> Imprimir
                        </a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Evento</th>
                                <th>Local</th>
                                <th>Organização</th>
                                <th>Público alvo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($calendars as $calendar)
                                @if(date('Y', strtotime($calendar->data)) == 2019)
                                <tr>
                                    <td><b>{{ date('d/m', strtotime($calendar->data))}}</b></td>
                                    <td>{{$calendar->horario}}</td>
                                    <td>{{$calendar->evento}}</td>
                                    <td>{{$calendar->local}}</td>
                                    <td>{{$calendar->organizacao}}</td>
                                    <td>{{$calendar->publico}}</td>
                                    @can('calendar_create')
                                    <td>
                                        <a href="{{route('calendars.edit', $calendar->id)}}" data-toggle = tooltip title=Editar><i class="fas fa-edit"></i></a> 
                                    </td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['CalendarController@destroy', $calendar->id], 'style'=>'display:inline']) !!}
                                            {!! Form::submit('x', ['class'=>'btn btn-danger btn-xs', 'data-toggle'=>'tooltip', 'title'=>'Excluir']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    @endcan
                                </tr>
                                @endif
                            @empty
                            <div class=" well alert-warning">
                                <p>Não tem Eventos cadastrados!</p>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

