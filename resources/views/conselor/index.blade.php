@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <b>CONSELHO DE COORDENAÇÃO MACEIÓ</b>
                </div>

                <div class="panel-body">
                    <!--
                    <div class="text-center">
                        <img src="{!! asset('assets/img/elder-simplicio.jpeg') !!}" class="img-thumbnail" style="width:15%">
                        <div class="caption">
                            <p>
                                <b>Élder</b> Henrique Sérgio <b>Simplício</b><br>
                                (85) 9603-2240<br>
                                simpliciohsa@ldschurch.org
                            </p>
                        </div>
                    </div>
                    -->
                    <div class="btn-group btn-group-justified" style="height:60px">
                        <a href="{{route('conselor.calendars.index')}}" class="btn btn-default btn-lg"><i class="fas fa-calendar-alt"></i> Calendário</a>
                        <a href="{{route('conselor.stakes.index')}}" class="btn btn-default btn-lg"><i class="fas fa-home"></i> Estacas/Distritos</a>
                        <a href="{{route('conselor.leaders.index')}}" class="btn btn-default btn-lg"><i class="fas fa-users"></i> Líderes Regionais</a>
                    </div>

                    <div class="btn-group btn-group-justified" style="height:60px">
                        <a href="{{route('conselor.meetings.index')}}" class="btn btn-default btn-lg"><i class="fas fa-edit"></i> Agendas</a>
                        @can('adm')
                        <a href="{{route('conselor.files.index')}}" class="btn btn-default btn-lg"><i class="fas fa-copy"></i> Arquivos</a>
                        <a href="#" class="btn btn-default btn-lg"></a>
                        @endcan
                    </div>

                    <div><br></div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection