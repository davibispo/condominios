@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        CONSELHO DE COORDENAÇÃO MACEIÓ
                        <br>
                        <b>AGENDAS DE REUNIÕES</b>
                    </div>

                <div class="panel-body">
                    <div class="text-left">
                        <a href="{{route('conselor.index')}}" class="btn btn-default btn-xs">
                            <i class="fas fa-angle-left"></i> voltar
                        </a>
                        @can('conselor_edit')
                        <a href="{{ route('conselor.meetings.create') }}" class="btn btn-primary btn-xs">
                            <i class="fas fa-plus"></i> Nova Agenda
                        </a>
                        @endcan
                    </div>
                    <br>
                    <table class="table table-striped">
                        <tr>
                            <th>Data</th>
                            <th>Reunião</th>
                            <th>Presidida por</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($agendas as $agenda)
                        <tr>
                            <td>{{date('d/m/Y', strtotime($agenda->data))}}</td>
                            <td>{{$agenda->reuniao}}</td>
                            <td>{{$agenda->presidindo}}</td>
                            <td>
                                <a href="{{route('conselor.meetings.show', $agenda->id)}}" data-toggle = tooltip title=ver target="_blank"><i class="fas fa-eye"></i></a> 
                                @can('conselor_edit')
                                    <a href="{{route('conselor.meetings.edit', $agenda->id)}}" data-toggle = tooltip title=Editar><i class="fas fa-edit"></i></a> 
                                @endcan
                            </td>
                            <td>
                                @can('conselor_edit')
                                {!! Form::open(['method'=>'DELETE', 'action'=>['ConselorController@meetingDestroy', $agenda->id],'data-toggle'=>'tooltip','title'=>'Excluir', 'style'=>'display:inline']) !!}
                                    {!! Form::submit('x', ['class'=>'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <div class="alert">
                            <p>Não existe agenda!</p>
                        </div>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection