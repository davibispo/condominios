@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Agendas Sacramentais</b></div>

                <div class="panel-body">
                    @can('sacramental_meeting_create')
                    <div class="">
                        <a href="{{route('sacramental-meetings.create')}}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> 
                            Nova Agenda
                        </a>
                    </div>
                    @endcan
                    <br>    
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Unidade</th>
                            <th>Data</th>
                            <th>Presidida por</th>
                            <th>Dirigida por</th>
                            <th>Frequência</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($sacramentalMeetings as $sacramentalMeeting)
                            <tr>
                                <td>{{$sacramentalMeeting->ward}}</td>
                                <td>{{date('d-m-y',strtotime($sacramentalMeeting->date))}}</td>
                                <td>{{$sacramentalMeeting->presidida}}</td>
                                <td>{{$sacramentalMeeting->dirigida}}</td>
                                <td><b>{{$sacramentalMeeting->frequencia}}</b></td>
                                <td>
                                    <a href="{{route('sacramental-meetings.show',$sacramentalMeeting->id)}}" target="_blank" data-toggle = tooltip title=Ver><i class="fas fa-eye"></i></a> 
                                </td>
                                <td>
                                    @can('sacramental_meeting_update')
                                    <a href="{{route('sacramental-meetings.edit',$sacramentalMeeting->id)}}" data-toggle = tooltip title=Editar><i class="fas fa-edit"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection