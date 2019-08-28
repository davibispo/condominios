@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Caravanas da Estaca {{$stake}}</b></div>

                <div class="panel-body">
                    <div class="text-center">
                        <h4>Escolha uma caravana e faça sua reserva!</h4>
                    </div>
                    <br>
                    <div class="well">
                        <div class="panel-group" id="accordion">
                            @forelse($caravans as $caravan)

                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title text-center">
                                        @php
                                            //calculo das vagas restantes
                                            $qtdPoltronas = 50;
                                            $listaPrincipal = 0;
                                            foreach ($caravanUsers as $caravanUser){
                                                if($caravanUser->caravan_id == $caravan->id && $caravanUser->poltrona > 0 && $caravanUser->poltrona != 99){
                                                    $listaPrincipal++;
                                                }
                                            }
                                            $vagas = $qtdPoltronas - $listaPrincipal;
                                        @endphp

                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$caravan->id}}">
                                            <i class="fas fa-bus"></i> Caravana de <b>{{ date("d/m/Y", strtotime($caravan->data))}}</b>
                                            @if ($caravan->status == 1)
                                                <b style="color:red">(Semana)</b>
                                            @endif
                                            ------- Vagas: <b>{{$vagas}}</b>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse{{$caravan->id}}" class="panel-collapse collapse out">
                                    <div class="panel-body">
                                        <div class="alert alert-warning">
                                            {{$caravan->obs}}
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <td class="text-left">
                                                    <a href="{{route('caravan-users.create-caravan-user', $caravan->id)}}" class="btn btn-success btn-sm">
                                                        <i class="fas fa-bus fa-lg" aria-hidden="true"></i> VAGAS
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{route('caravan-users.show', $caravan->id)}}" class="btn btn-default btn-sm">
                                                        <i class="fas fa-bars" aria-hidden="true"></i> Detalhes
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        <!--Lista Principal-->
                                        <div class="well">    
                                        <p>Lista Principal</p>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Poltrona</th> 
                                                    <th>Membros</th> 
                                                    <th>Unidade</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($caravanUsers as $caravanUser)
                                                    @foreach ($users as $user)
                                                        @if($caravanUser->caravan_id == $caravan->id && $caravanUser->user_id == $user->id && $caravanUser->status != $statusReserva && $caravanUser->status != 5)    
                                                        <tr>
                                                            <td>{{$caravanUser->poltrona}}</td>
                                                            @if(isset($caravanUser->kid) && ($caravanUser->caravan_id == $caravan->id && $caravanUser->user_id == $user->id) && ($caravanUser->status != 5))
                                                                <td>{{$caravanUser->kid}}</i></td>
                                                            @else
                                                                <td>{{$user->name}} {{$user->lastname}}</td>
                                                            @endif
                                                            <td>{{$user->ward}}</td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @empty
                                            <div class=" well alert-warning">
                                                <p>Não tem membros cadastrados nesta lista.</p>
                                            </div>
                                            @endforelse
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                        <!--Fim da lista principal-->
                                        <!-- Lista Reserva -->
                                        <div class="well">   
                                        <p>Lista Reserva</p>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Membros</th> 
                                                    <th>Unidade</th> 
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($caravanUsers as $caravanUser)
                                                    @foreach ($users as $user)
                                                        @if($caravanUser->caravan_id == $caravan->id && $caravanUser->user_id == $user->id && ($caravanUser->status == $statusReserva || $caravanUser->status == 5))
                                                        <tr>
                                                            @if(isset($caravanUser->kid))
                                                            <td>{{$caravanUser->kid}}</i></td>
                                                            @else
                                                            <td>{{$user->name}} {{$user->lastname}}</td>
                                                            @endif
                                                            <td>{{$user->ward}}</td>
                                                            <td></td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @empty
                                            <div class=" well alert-warning">
                                                <p>Não tem membros cadastrados nesta lista.</p>
                                            </div>
                                            @endforelse
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                        <!--Fim da lista Reserva-->
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class=" well alert-warning">
                                <p>Não tem caravanas cadastradas!</p>
                            </div>
                            @endforelse
                        </div> 
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


