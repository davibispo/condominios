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
                    <div class="text-left">
                        <a href="{{route('conselor.index')}}" class="btn btn-default btn-xs">
                            <i class="fas fa-angle-left"></i> voltar
                        </a>
                        @can('conselor_edit')
                        <a href="{{route('conselor.calendars.create')}}" class="btn btn-primary btn-xs">
                            <i class="fas fa-plus"></i> Adicionar evento
                        </a>
                        @endcan
                    </div>
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Evento</th>
                                <th>Local</th>
                                <th>Organização</th>
                                <th>Observações</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($eventos as $evento)
                            <tr>
                                <th>{{strftime('%d/%b/%y',strtotime($evento->date))}}</th>
                                <td>{{$evento->horario}}</td>
                                <td>{{$evento->evento}}</td>
                                <td>{{$evento->local}}</td>
                                <td>{{$evento->org}}</td>
                                <td>{{$evento->obs}}</td>
                                <td>
                                    @can('conselor_edit')
                                    <a href="{{route('conselor.calendars.edit', $evento->id)}}" data-toggle = tooltip title=Editar><i class="fas fa-edit"></i></a> 
                                    @endcan
                                </td>
                                <td>
                                    @can('conselor_edit')
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['ConselorController@calendarDestroy', $evento->id], 'style'=>'display:inline']) !!}
                                        {!! Form::submit('x', ['class'=>'btn btn-danger btn-xs', 'data-toggle'=>'tooltip', 'title'=>'Excluir']) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>                           
                                
                            @empty
                                <div class="alert alert-warning">
                                    <p>Não há eventos cadastrados!</p>
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