@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Agendas de Reuniões da Estaca {{$stake}}</b></div>

                <div class="panel-body">
                    @can('sacramental_meeting_index')
                    <a href="{{route('sacramental-meetings.index')}}">Agenda da Reunião Sacramental</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

