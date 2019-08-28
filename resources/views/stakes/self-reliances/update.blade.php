@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><b>Grupos de Autossuficiência de {{strtoupper($ward)}}</b></div>

                <div class="panel-body">
                    
                    <table class="table table-bordered" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Curso escolhido</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user->id == $groupMember->user_id)
                                    <tr class="text-center">
                                        <td>{!! $user->name !!} {!! $user->lastname !!}</td>
                                        <td>{!! $user->phone !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td>{!! $groupMember->grupo !!}</td>
                                        <td>
                                            @switch($groupMember->status)
                                                @case('1')
                                                    <font color='orange'>{!! "Solicitado" !!}</font>
                                                    @break
                                                @case('2')
                                                    <font color='green'>{!! "Matriculado" !!}</font>    
                                                    @break
                                                @case('4')
                                                    <font color='red'>{!! "Desistente" !!}</font>    
                                                    @break
                                                @case('5')
                                                    <font color='blue'>{!! "CONCLUÍDO" !!}</font>    
                                                    @break
                                                @default
                                            @endswitch
                                        </td>
                                        <td class="text-left">
                                            <div class="form-group">    
                                                {!! Form::model($groupMember,['method'=>'PATCH', 'action'=>['SelfRelianceController@update', $groupMember->id], 'class'=>'form-inline']) !!}
                                                    {!! Form::hidden('status', '2') !!}
                                                    {!! Form::submit('Matricular', ['class'=>'btn btn-success btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="form-group">    
                                                {!! Form::model($groupMember,['method'=>'PATCH', 'action'=>['SelfRelianceController@update', $groupMember->id], 'class'=>'form-inline']) !!}
                                                    {!! Form::hidden('status', '4') !!}
                                                    {!! Form::submit('Desistiu', ['class'=>'btn btn-danger btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="form-group">    
                                                {!! Form::model($groupMember,['method'=>'PATCH', 'action'=>['SelfRelianceController@update', $groupMember->id], 'class'=>'form-inline']) !!}
                                                    {!! Form::hidden('status', '5') !!}
                                                    {!! Form::submit('Concluiu', ['class'=>'btn btn-primary btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                                
                                            <div class="form-group">
                                                {!! Form::open(['method'=>'DELETE', 'action'=>['SelfRelianceController@destroy', $groupMember->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Excluir', ['class'=>'btn btn-default btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach      
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


