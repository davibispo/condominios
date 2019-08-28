@extends('layouts.print-version')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Caravana da Estaca {{$stake}}</b></div>

                <div class="panel-body" style="font-size: 10px">
                    <div class="text-center">
                        <h4><i class="fas fa-bus"></i> Caravana de <b>{{date('d-m-Y', strtotime($caravan->data))}}</b></h4>
                    </div>
                    
                    <div class="text-center">
                        <a onclick="javascript:window.print();" class="btn btn-link btn-xs">
                            <i class="fas fa-print"></i>
                            <b>Imprimir</b>
                        </a>
                    </div>        
                        <table class="table table-striped">
                            <tr class="text-center">
                                <td colspan="4"><b>Líder da caravana:</b> {{$caravan->leader}} - <b>Telefone:</b> {{$caravan->phone}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Membros na Lista Principal: <b>{{$listaPrincipal}}</td>
                                <td class="text-right" colspan="2">Valor total da caravana por membro:<b> R$ {{number_format($caravanPrice, 2, ',', ' ')}}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">Membros na Lista Reserva: <b>{{$listaReserva}}</b></td>
                                <td class="text-right" colspan="2">Vagas restantes: 
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
                                    <b>{{$vagas}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Total de membros cadastrados: <b>{{$totalCadastrados}}</b></td>
                                <td class="text-right" colspan="2">
                                    
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center" colspan="4">
                                    <i>
                                        Valor do aluguel do ônibus: 
                                        R$ {{number_format($caravan->bus, 2, ',', ' ')}} 
                                        | 
                                        Valor da pernoite: R$ {{number_format($caravan->accommodation, 2, ',', ' ')}}
                                    </i>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="4">
                                    <i><b>Observações:</b><br>{{$caravan->obs}}</i>
                                </td>
                            </tr>
                        </table>
                    
                        <p class="text-left">Lista Principal</p>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Pol.</th> 
                                    <th>Membros</th> 
                                    <th>RG</th> 
                                    <th>Id</th> 
                                    <th>Telefone</th> 
                                    <th>Unidade</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($caravanUsers as $caravanUser)
                                @foreach ($users as $user)
                                @if($caravanUser->caravan_id == $caravan->id && $caravanUser->user_id == $user->id && $caravanUser->status != $statusReserva && $caravanUser->status != 5)
                                <tr>
                                    <td>{{$caravanUser->poltrona}}</td>
                                    @if(isset($caravanUser->kid) && $caravanUser->user_id == $user->id && ($caravanUser->status != $statusReserva || $caravanUser->status == 5))
                                        <td>{{$caravanUser->kid}}</td>
                                        <td>{{$caravanUser->kid_doc}}</td>
                                        <td>{{$caravanUser->kid_age}}</td>
                                    @else
                                        <td>{{$user->name}} {{$user->lastname}}</td>
                                        <td>{{$user->rg}} {{$user->orgao_exp}}</td>
                                        <td>
                                            @php
                                            $dataNasc = $user->dt_nasc;
                                            $anoAtual = date('Y');
                                            $mesAtual = date('m');
                                            $anoNasc = date('Y', strtotime($dataNasc));
                                            $mesNasc = date('m', strtotime($dataNasc));

                                            $idade = $anoAtual - $anoNasc;

                                            if ($mesNasc >= $mesAtual) {
                                            $idade --;
                                            } else {
                                            $idade ++;
                                            }
                                            @endphp
                                            {{$idade}}
                                        </td>
                                    @endif
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->ward}}</td>

                                </tr>
                                @endif
                                @endforeach
                                @empty
                            <div class=" well alert-warning">
                                <p>Não tem membros cadastrados nesta lista.</p>
                            </div>
                            @endforelse
                            </tbody>
                        </table>

                    <!-- Lista Reserva -->
                        <p class="text-left">Lista Reserva</p>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Membros</th> 
                                    <th>RG</th> 
                                    <th>Id</th> 
                                    <th>Telefone</th> 
                                    <th>Unidade</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($caravanUsers as $caravanUser)
                                @foreach ($users as $user)
                                @if($caravanUser->caravan_id == $caravan->id && $caravanUser->user_id == $user->id && ($caravanUser->status == $statusReserva || $caravanUser->status == 5))
                                <tr>

                                    @if(isset($caravanUser->kid))
                                        <td>{{$caravanUser->kid}}</i></td>
                                        <td>{{$caravanUser->kid_doc}}</td>
                                    @else
                                        <td>{{$user->name}} {{$user->lastname}}</td>
                                        <td>{{$user->rg}} {{$user->orgao_exp}}</td>
                                    @endif
                                    <td>
                                        @php
                                            $dataNasc = $user->dt_nasc;
                                            $anoAtual = date('Y');
                                            $mesAtual = date('m');
                                            $anoNasc = date('Y', strtotime($dataNasc));
                                            $mesNasc = date('m', strtotime($dataNasc));

                                            $idade = $anoAtual - $anoNasc;

                                            if ($mesNasc >= $mesAtual) {
                                                $idade --;
                                            } else {
                                                $idade ++;
                                            }
                                        @endphp
                                        {{$idade}}
                                    </td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->ward}}</td>

                                </tr>
                                @endif
                                @endforeach
                                @empty
                            <div class=" well alert-warning">
                                <p>Não tem membros cadastrados nesta lista.</p>
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


