@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Indicações de Chamados para servir na Estaca {!!$stake!!}</b></div>

                <div class="panel-body">
                    <div>
                        <a href="{!!route('calleds.index')!!}" class="btn btn-default btn-xs">
                            <i class="fas fa-angle-left"></i> voltar
                        </a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover" style="font-size: 12px">
                        <thead>
                            <tr>
                                <tr>
                                    <th>Chamado</th> 
                                    <th>Membro</th>
                                    <th>Unidade</th> 
                                    <th>Ofício</th>
                                    <th>Indicado por</th>
                                    <th>Enviado em</th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width:20%"><b>{!!$called->called!!}</b></td>
                                <td style="width:20%"><b>{!!$called->member!!}</b></td>
                                <td style="width:10%">{!!$called->ward!!}</td>
                                <td style="width:10%">{!!$called->priesthood!!}</td>
                                <td style="width:30%">{!!$userName!!} {!!$userLastname!!}</td>
                                <td style="width:10%">{!!date('d/m/Y', strtotime($called->created_at))!!}</td>
                            </tr>
                            <tr>   
                                <td colspan="3"><b>OBS:</b> {!!$called->obs!!}</td>
                                <td colspan="2"><b>Status:</b> 
                                    @switch($called->status)
                                        @case('1') <font color='orange'>{!!'Analisando indicação'!!}</font> @break
                                        @case('2') <font color='green'>{!!'Foi aprovado e será apoiado(a)'!!}</font> @break
                                        @case('3') <font color='blue'>{!!'Já apoiado em congregação e designado'!!}</font> @break
                                        @case('4') <font color='red'>{!!'Rejeitado'!!}. {!! $called->reason_reject !!}</font> @break
                                        @default    
                                    @endswitch
                                </td>

                                <td></td>
                            </tr>   
                        </tbody>
                    </table>
                    <div class="form-group">
                        {!! Form::model($called,['method'=>'PATCH', 'action'=>['CalledController@update', $called->id], 'class'=>'form-inline']) !!}
                            {!! Form::hidden('status', '2') !!}
                            {!! Form::submit('Foi aprovado e será apoiado(a)', ['class'=>'btn btn-success btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                        
                        <div class="form-group">    
                            {!! Form::model($called,['method'=>'PATCH', 'action'=>['CalledController@update', $called->id], 'class'=>'form-inline']) !!}
                                {!! Form::hidden('status', '3') !!}
                                {!! Form::submit('Já apoiado em congregação e designado', ['class'=>'btn btn-primary btn-sm']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="form-group">
                            {!! Form::model($called,['method'=>'PATCH', 'action'=>['CalledController@update', $called->id], 'class'=>'form-inline']) !!}
                                {!! Form::hidden('status', '4') !!}
                                {!! Form::label('reason_reject', 'Rejeitar indicação: ', ['class'=>'control-label']) !!}<br>
                                <textarea name="reason_reject" cols="100" rows="" class="form-control" placeholder="Se desejar, informe o motivo da rejeição."></textarea><br>
                                {!! Form::submit('Rejeitar indicação', ['class'=>'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="form-group">
                            {!! Form::open(['method'=>'DELETE', 'action'=>['CalledController@destroy', $called->id], 'style'=>'display:inline']) !!}
                                {!! Form::submit('Excluir Indicação', ['class'=>'btn btn-default btn-sm']) !!}
                            {!! Form::close() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




