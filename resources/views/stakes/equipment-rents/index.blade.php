@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Empréstimo de Equipamentos da Estaca {{$stake}}</b></div>

                <div class="panel-body">
                    <div>
                        <a href="{{route('equipment-rents.create')}}" class="btn btn-primary btn-sm">
                            Solicitar Equipamento
                        </a>
                    </div>
                    <br>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($equipmentRents as $equipmentRent)
                                @foreach($users as $user)
                                    @if($user->id == $equipmentRent->user_id)
                                        <tr>
                                            <td><b>{{DB::table('equipment')->where('id',$equipmentRent->equipment_id)->value('name')}}</b></td>
                                            <td>{{$user->name}} {{$user->lastname}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->ward}}</td>
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
                                            <td>
                                                @can('equipment_rent_update')
                                                <a href="{{route('equipment-rents.edit', $equipmentRent->id)}}" data-toggle="tooltip" title="Ações">
                                                    <i class="fas fa-sign-in-alt fa-lg"></i>
                                                </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @empty
                        <div class=" well alert-warning">
                            <p>Não tem equipamentos solicitados!</p>
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

