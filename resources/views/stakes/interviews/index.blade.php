@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Entrevistas da Estaca {{$stake}} ou Bênção Patriarcal</b></div>

                <div class="panel-body">
                    <div>
                        <a href="{{route('interviews.create')}}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> 
                            Solicitar
                        </a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover" style="font-size:12px">
                        <thead>
                            <tr>
                                <th style="width:20%">Membro</th>
                                <th style="width:10%">Telefone</th> 
                                <th style="width:10%">Unidade</th> 
                                <th style="width:15%">Motivo da entrevista</th>
                                <th style="width:10%">Entrevistador</th>
                                <th style="width:10%">Status</th>
                                <th style="width:10%">Solicitada em</th>
                                <th style="width:15%">Marcada para</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($interviews as $interview)
                                @foreach($users as $user)
                                    @if($user->id == $interview->user_id)
                                        @if($interview->interview_type_id == 6)
                                        
                                        <tr>
                                            <th>{{$user->name}} {{$user->lastname}}</th>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->ward}}</td>
                                            <th>{{DB::table('interview_types')->where('ativo','1')->where('id',$interview->interview_type_id)->value('description')}}</th>
                                            <th>{{$interview->interviewer}}</th>
                                            <td>
                                                @switch($interview->status)
                                                    @case(1)<font color='orange'>{{'Solicitada'}}</font>@break
                                                    @case(2)<font color='green'><b>{{'CONFIRMADA'}}</b></font>@break
                                                    @case(3)<font color='red'>{{'Cancelada'}}</font>@break
                                                    @case(4)<font color='blue'>{{'Realizada'}}</font>@break
                                                    @default Default case... 
                                                @endswitch
                                            </td>
                                            <td>{{date('d/m/y', strtotime($interview->created_at))}}</td>
                                            <td>
                                                @if(date('Y', strtotime($interview->data)) > '2017' )
                                                    <b>{{date('d/m/y', strtotime($interview->data))}}</b> às 
                                                    <b>{{date('H:i', strtotime($interview->data))}}</b>
                                                @endif
                                            </td>
                                            <td>
                                                @can('interview_update_patriarca')
                                                <a href="{{route('interviews.edit', $interview->id)}}" data-toggle="tooltip" title="Ações">
                                                    <i class="fas fa-sign-in-alt fa-lg"></i>
                                                </a>
                                                @endcan
                                            </td>
                                        </tr>
                                        
                                        @else   
                                        <tr>
                                            <th>{{$user->name}} {{$user->lastname}}</th>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->ward}}</td>
                                            <th>{{DB::table('interview_types')->where('ativo','1')->where('id',$interview->interview_type_id)->value('description')}}</th>
                                            <th>{{$interview->interviewer}}</th>
                                            <td>
                                                @switch($interview->status)
                                                    @case(1)<font color='orange'>{{'Solicitada'}}</font>@break
                                                    @case(2)<font color='green'><b>{{'CONFIRMADA'}}</b></font>@break
                                                    @case(3)<font color='red'>{{'Cancelada'}}</font>@break
                                                    @case(4)<font color='blue'>{{'Realizada'}}</font>@break
                                                    @default Default case... 
                                                @endswitch
                                            </td>
                                            <td>{{date('d/m/y', strtotime($interview->created_at))}}</td>
                                            <td>
                                                @if(date('Y', strtotime($interview->data)) > '2017' )
                                                    <b>{{date('d/m/y', strtotime($interview->data))}}</b> às 
                                                    <b>{{date('H:i', strtotime($interview->data))}}</b>
                                                @endif
                                            </td>
                                            <td>
                                                @can('interview_update_presidencia')
                                                <a href="{{route('interviews.edit', $interview->id)}}" data-toggle="tooltip" title="Ações">
                                                    <i class="fas fa-sign-in-alt fa-lg"></i>
                                                </a>
                                                @endcan
                                            </td>
                                        </tr>
                                        
                                        @endif
                                    @endif
                                @endforeach
                            @empty
                        <div class=" well alert-warning">
                            <p>Você não tem entrevistas solicitadas!</p>
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

