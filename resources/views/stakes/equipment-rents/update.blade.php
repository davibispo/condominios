@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Controle de Empréstimos de Equipamentos da Estaca {{$stake}}</b></div>

                <div class="panel-body">
                    <div>
                        <a href="{{route('equipment-rents.index')}}" class="btn btn-default btn-xs">
                            <i class="fas fa-angle-left"></i> voltar
                        </a>
                    </div>
                    <table class="table table-striped table-hover" style="font-size: 12px">
                        <thead>
                            <tr>
                                <th>Equipamento</th>
                                <th>Membro</th> 
                                <th>Telefone</th> 
                                <th>Unidade</th> 
                                <th>Retirada</th>
                                <th>Devolução</th>
                                <th>Motivo da solicitação</th>
                                <th>Solicitado em</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>{{$equipment}}</b></td>
                                <td>{{$userName}} {{$userLastname}}</td>
                                <td>{{$userPhone}}</td>
                                <td>{{$userWard}}</td>
                                <td><b>{{date('d/m/y', strtotime($equipmentRent->get_date))}}</b></td>
                                <td><b>{{date('d/m/y', strtotime($equipmentRent->return_date))}}</b></td>
                                <td>{{$equipmentRent->reason_get}}</td>
                                <td>{{date('d/m/y', strtotime($equipmentRent->created_at))}}</td>
                                <td>
                                    @switch($equipmentRent->status)
                                        @case(1)<font color='orange'>{{'Solicitado'}}</font>@break
                                        @case(2)<font color='green'><b>{{'Retirada Liberada'}}</b></font>@break
                                        @case(3)<font color='blue'>{{'Devolvido'}}</font>@break
                                        @case(4)<font color='red'>{{'Negado'}}.<br>{{$equipmentRent->reason_refuses}}</font>@break
                                        @default Default case... 
                                    @endswitch
                                </td>
                                
                            </tr>   
                        </tbody>
                    </table>
                    <div class="form-group">
                        {!! Form::model($equipmentRent,['method'=>'PATCH', 'action'=>['EquipmentRentController@update', $equipmentRent->id], 'class'=>'form-inline']) !!}
                            {!! Form::hidden('status', '2') !!}
                            {!! Form::submit('Liberar Retirada', ['class'=>'btn btn-success btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                        
                        <div class="form-group">    
                        {!! Form::model($equipmentRent,['method'=>'PATCH', 'action'=>['EquipmentRentController@update', $equipmentRent->id], 'class'=>'form-inline']) !!}
                            {!! Form::hidden('status', '3') !!}
                            {!! Form::submit('Equipamento Devolvido', ['class'=>'btn btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                        </div>
                            <div class="form-group">
                            {!! Form::model($equipmentRent,['method'=>'PATCH', 'action'=>['EquipmentRentController@update', $equipmentRent->id], 'class'=>'form-inline']) !!}
                                {!! Form::hidden('status', '4') !!}
                                {!! Form::label('reason_refuses', 'Negar solicitação: ', ['class'=>'control-label']) !!}
                                {!! Form::text('reason_refuses', null, ['class'=>'form-control', 'placeholder'=>'Motivo da recusa..']) !!}
                                {!! Form::submit('Negar', ['class'=>'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                            </div>
                            <div class="form-group">
                            {!! Form::open(['method'=>'DELETE', 'action'=>['EquipmentRentController@destroy', $equipmentRent->id], 'style'=>'display:inline']) !!}
                                {!! Form::submit('Excluir Solicitação', ['class'=>'btn btn-default btn-sm']) !!}
                            {!! Form::close() !!}
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




