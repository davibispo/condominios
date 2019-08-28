@extends('layouts.print-version')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>Calendário da Estaca {{$stake}} - {{date('Y')}}</b></div>
                <div class="text-center">
                    <a onclick="javascript:window.print();" class="btn btn-link btn-xs">
                        <i class="fas fa-print"></i>
                        <b>Impressão</b>
                    </a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover" style="font-size:10px">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Evento</th>
                                <th>Local</th>
                                <th>Organização</th>
                                <th>Público alvo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($calendars as $calendar)
                                @if(date('Y', strtotime($calendar->data)) == date('Y'))
                                <tr>
                                    <td><b>{{ date('d/m', strtotime($calendar->data))}}</b></td>
                                    <td>{{$calendar->horario}}</td>
                                    <td>{{$calendar->evento}}</td>
                                    <td>{{$calendar->local}}</td>
                                    <td>{{$calendar->organizacao}}</td>
                                    <td>{{$calendar->publico}}</td>
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

