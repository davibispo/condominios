@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Estaca <b>{{$stake}}</b></div>
            <div class="col-sm-12">

                <div class="alert alert-warning">
                    <div style="font-size:12px; text-align:justify;">
                        Mensagem da Presidência da Estaca: 
                        
                            @forelse($messages as $message)
                                @foreach($users as $user)
                                    @if($message->stake == $user->stake && $message->user_id == $user->id)
                                        <b>{{$message->message}}</b>
                                        <i>(Pres. {{$user->name}})</i>
                                    @endif
                                @endforeach
                            @empty
                                <b>Não há mensagem!</b>
                            @endforelse
                        <br>
                        @can('message_create')
                        <a href="{{route('messages.index')}}">Editar</a>
                        @endcan
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Calendário</h4>
                            @can('calendar_index')
                            <p><a href="{{route('calendars.index')}}">Ver</a></p>    
                            @endcan
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Entrevistas</h4>
                            @can('interview_index')
                            <p><a href="{{route('interviews.index')}}">Solicitar</a></p> 
                            @endcan
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Caravanas</h4>
                            @can('caravan_user_index')
                            <p><a href="{{route('caravan-users.index')}}">Reservas</a></p> 
                            @endcan
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Chamados</h4>
                            @can('called_index')
                            <p><a href="{{route('calleds.index')}}">Indicações</a></p> 
                            @endcan
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Equipamentos</h4>
                            @can('equipment_rent_index')
                            <p><a href="{{route('equipment-rents.index')}}">Empréstimos</a></p> 
                            @endcan
                        </div>
                    </div>
                    @can('meeting_index')
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Agendas</h4>
                            <p><a href="{{route('sacramental-meetings.index')}}">Sacramental</a></p> 
                        </div>
                    </div>
                    @endcan
                    @can('conselor_index')
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Conselho Maceió</h4>
                            <p><a href="{{route('conselor.index')}}">Acessar</a></p> 
                        </div>
                    </div>
                    @endcan
                    <!--
                    @can('self-reliance_index')
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Curso Inglês</h4>
                            <p><a href="{{route('self-reliances.index')}}">Inscrições</a></p> 
                        </div>
                    </div>
                    @endcan
                -->
                </div>
               
            </div>
            
        </div>
    </div>
</div>


@endsection
