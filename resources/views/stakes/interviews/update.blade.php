@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Controle de Entrevistas da Estaca {{$stake}}</b></div>

                <div class="panel-body">
                    <table class="table table-striped table-hover" style="font-size:12px">
                        <thead>
                            <tr>
                                <th>Membro</th>
                                <th>Telefone</th> 
                                <th>Unidade</th> 
                                <th>Motivo da entrevista</th>
                                <th>Entrevistador</th>
                                <th>Status</th>
                                <th>Solicitada em</th>
                                <th>Marcado para</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($interview->interview_type_id == 6)
                            @can('interview_update_patriarca')
                            <tr>
                                <td>{{$userName}} {{$userLastname}}</td>
                                <td>{{$userPhone}}</td>
                                <td>{{$userWard}}</td>
                                <td>{{$interviewType}}</td>
                                <td>{{$interview->interviewer}}</td>
                                <td>
                                    @switch($interview->status)
                                        @case(1)<font color='orange'>{{'Solicitada'}}</font>@break
                                        @case(2)<font color='green'><b>{{'CONFIRMADA'}}</b></font>@break
                                        @case(3)<font color='red'>{{'Cancelada'}}</font>@break
                                        @case(4)<font color='blue'>{{'Realizada'}}</font>@break
                                        @default Default case... 
                                    @endswitch
                                </td>
                                <td>{{date('d/m/Y', strtotime($interview->created_at))}}</td>
                                <td>
                                    @if(date('Y', strtotime($interview->data)) > '2017' )
                                        {{date('d/m/Y', strtotime($interview->data))}} às 
                                        {{date('H:i', strtotime($interview->data))}}
                                    @endif
                                </td>
                            </tr>
                            @endcan
                            @else
                            @can('interview_update_presidencia')
                            <tr>
                                <td>{{$userName}} {{$userLastname}}</td>
                                <td>{{$userPhone}}</td>
                                <td>{{$userWard}}</td>
                                <td>{{$interviewType}}</td>
                                <td>{{$interview->interviewer}}</td>
                                <td>
                                    @switch($interview->status)
                                        @case(1)<font color='orange'>{{'Solicitada'}}</font>@break
                                        @case(2)<font color='green'><b>{{'CONFIRMADA'}}</b></font>@break
                                        @case(3)<font color='red'>{{'Cancelada'}}</font>@break
                                        @case(4)<font color='blue'>{{'Realizada'}}</font>@break
                                        @default Default case... 
                                    @endswitch
                                </td>
                                <td>{{date('d/m/Y', strtotime($interview->created_at))}}</td>
                                <td>
                                    @if(date('Y', strtotime($interview->data)) > '2017' )
                                        {{date('d/m/Y', strtotime($interview->data))}} às 
                                        {{date('H:i', strtotime($interview->data))}}
                                    @endif
                                </td>
                                <td></td>
                            </tr>
                            @endcan
                            @endif
                        </tbody>
                    </table>
                        {!! Form::model($interview,['method'=>'PATCH', 'action'=>['InterviewController@update', $interview->id], 'class'=>'form-inline']) !!}
                    <div class="form-group text-left">
                        
                            <label for="data">Escolha o dia e hora da entrevista</label> <br>
                            <input type="datetime-local" class="form-control" name="data">
                            {!! Form::hidden('status', '2') !!}
                            {!! Form::submit('CONFIRMAR', ['class'=>'btn btn-success btn-sm']) !!}
                        {!! Form::close() !!}
                        
                        <div class="form-group">    
                        {!! Form::model($interview,['method'=>'PATCH', 'action'=>['InterviewController@update', $interview->id], 'class'=>'form-inline']) !!}
                            {!! Form::hidden('data', null, ['class' => 'form-control']) !!}
                            {!! Form::hidden('status', '4') !!}
                            {!! Form::submit('Foi Realizada', ['class'=>'btn btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                        </div>
                        <div class="form-group">
                        {!! Form::model($interview,['method'=>'PATCH', 'action'=>['InterviewController@update', $interview->id], 'class'=>'form-inline']) !!}
                            {!! Form::hidden('data', null, ['class' => 'form-control']) !!}
                            {!! Form::hidden('status', '3') !!}
                            {!! Form::submit('Cancelada', ['class'=>'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                        </div>
                        <div class="form-group">
                        {!! Form::open(['method'=>'DELETE', 'action'=>['InterviewController@destroy', $interview->id], 'style'=>'display:inline']) !!}
                            {!! Form::submit('Excluir', ['class'=>'btn btn-default btn-sm']) !!}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




