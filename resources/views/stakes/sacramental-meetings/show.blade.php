@extends('layouts.print-version')

@section('content')

<div class="container">

    <div class="col-md-12">
        <div class="panel-heading text-center">Agenda da Reunião Sacramental - <b>{{strtoupper($sacramentalMeeting->ward)}}</b> - Estaca {{$stake}}</div>

        <a onclick="javascript:window.print();" class="btn btn-link btn-xs">
            <i class="fas fa-print fa-xs"></i>
            impressão
        </a>

        <!--Cabeçalho-->
        <div class="well well-xs">
            <table class="table table-hover" style="font-size:10px">

                <tr>
                    <td><b>Data:</b> {{date('d/m/y', strtotime($sacramentalMeeting->date))}}</td>
                    <td><b>Presidida:</b> {{$sacramentalMeeting->presidida}}</td>
                    <td><b>Dirigida:</b> {{$sacramentalMeeting->dirigida}}</td>
                    <td><b>Freq.:</b> {{$sacramentalMeeting->frequencia}}</td>
                </tr>
            </table>    

            <!--Reconhecimentos-->
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <td><b>Reconhecimentos:</b>
                        <i> 
                            <b>{{$sacramentalMeeting->rec_nome1}}</b> - {{$sacramentalMeeting->rec_cham1}},  
                            <b>{{$sacramentalMeeting->rec_nome2}}</b> - {{$sacramentalMeeting->rec_cham2}},  
                            <b>{{$sacramentalMeeting->rec_nome3}}</b> - {{$sacramentalMeeting->rec_cham3}},  
                            <b>{{$sacramentalMeeting->rec_nome4}}</b> - {{$sacramentalMeeting->rec_cham4}}
                        </i>
                    </td>
                </tr>
            </table>

            <!--Anuncios-->
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <td><b>Anúncios</b></td>
                    <td><b>Data</b></td>
                    <td><b>Horário</b></td>
                    <td><b>Local</b></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->anun_1}}</td>
                    <td>
                        @if($sacramentalMeeting->data_anun_1 == null)
                        @else
                        {{strftime('%d/%b', strtotime($sacramentalMeeting->data_anun_1))}}
                        @endif
                    </td>
                    <td>{{$sacramentalMeeting->hora_anun_1}}</td>
                    <td>{{$sacramentalMeeting->local_anun_1}}</td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->anun_2}}</td>
                    <td>
                        @if($sacramentalMeeting->data_anun_2 == null)
                        @else
                        {{strftime('%d/%b', strtotime($sacramentalMeeting->data_anun_2))}}
                        @endif
                    </td>
                    <td>{{$sacramentalMeeting->hora_anun_2}}</td>
                    <td>{{$sacramentalMeeting->local_anun_2}}</td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->anun_3}}</td>
                    <td>
                        @if($sacramentalMeeting->data_anun_3 == null)
                        @else
                        {{strftime('%d/%b', strtotime($sacramentalMeeting->data_anun_3))}}
                        @endif
                    </td>
                    <td>{{$sacramentalMeeting->hora_anun_3}}</td>
                    <td>{{$sacramentalMeeting->local_anun_3}}</td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->anun_4}}</td>
                    <td>
                        @if($sacramentalMeeting->data_anun_4 == null)
                        @else
                        {{strftime('%d/%b', strtotime($sacramentalMeeting->data_anun_4))}}
                        @endif
                    </td>
                    <td>{{$sacramentalMeeting->hora_anun_4}}</td>
                    <td>{{$sacramentalMeeting->local_anun_4}}</td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->anun_5}}</td>
                    <td>
                        @if($sacramentalMeeting->data_anun_5 == null)
                        @else
                        {{strftime('%d/%b', strtotime($sacramentalMeeting->data_anun_5))}}
                        @endif
                    </td>
                    <td>{{$sacramentalMeeting->hora_anun_5}}</td>
                    <td>{{$sacramentalMeeting->local_anun_5}}</td>
                </tr>
            </table>

            <!--Hino 1, Regente, pianista, oração-->
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <td><b>Hino de abertura</b></td>
                    <td><b>Regente</b> </td>
                    <td><b>Pianista</b> </td>
                    <td><b>Oração</b> </td>
                </tr>
                <tr>
                    <td>
                        @foreach ($hinos as $hino)
                        @if ($hino->num == $sacramentalMeeting->hino1)
                        {{$hino->num}} - {{$hino->nome}} 
                        @endif
                        @endforeach
                    </td>
                    <td>{{$sacramentalMeeting->regente}}</td>
                    <td>{{$sacramentalMeeting->pianista}}</td>
                    <td>{{$sacramentalMeeting->oracao1}}</td>
                </tr>
            </table>
        </div>

        <!--Bênção de crianças-->
        <div class="well well-xs">

            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <td><b>Bênção de Criança</b></td>
                    <td><b>Abençoador</b></td>
                    <td><b>Ofício no sacerdócio</b></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->bencao1}}</td>
                    <td>{{$sacramentalMeeting->abencoador1}}</td>
                    <td>{{$sacramentalMeeting->oficio1}}</td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->bencao2}}</td>
                    <td>{{$sacramentalMeeting->abencoador2}}</td>
                    <td>{{$sacramentalMeeting->oficio2}}</td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->bencao3}}</td>
                    <td>{{$sacramentalMeeting->abencoador3}}</td>
                    <td>{{$sacramentalMeeting->oficio3}}</td>   
                </tr>
            </table>

            <!--Confirmação de conversos-->
            <i style="font-size:10px">"Pedimos aos membros da congregação que expressem sua plena aceitação do(s) novo(s) membro(s) na ala erguendo a mão"</i>
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <td><b>Confirmações</b></td>
                    <td><b>Confirmador</b></td>
                    <td><b>Ofício no sacerdócio</b></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->converso1}}</td>
                    <td>{{$sacramentalMeeting->confirmador1}}</td>
                    <td>{{$sacramentalMeeting->oficio4}}</td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->converso2}}</td>
                    <td>{{$sacramentalMeeting->confirmador2}}</td>
                    <td>{{$sacramentalMeeting->oficio5}}</td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->converso3}}</td>
                    <td>{{$sacramentalMeeting->confirmador3}}</td>
                    <td>{{$sacramentalMeeting->oficio6}}</td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->converso4}}</td>
                    <td>{{$sacramentalMeeting->confirmador4}}</td>
                    <td>{{$sacramentalMeeting->oficio7}}</td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->converso5}}</td>
                    <td>{{$sacramentalMeeting->confirmador5}}</td>
                    <td>{{$sacramentalMeeting->oficio8}}</td>
                </tr>
            </table>

            <!--Desobrigações-->    
            <i style="font-size:10px">“[Nome] foi desobrigado do cargo de [cargo] e propomos dar-lhe um voto de agradecimento pelo serviço prestado. Os que desejarem manifestar sua gratidão queiram manifestar-se levantando a mão”</i>
            <table class="table table-hover" style="font-size:10px"> 
                <tr>
                    <td><b>Desobrigações</b></td>
                    <td><b>Chamado</b></td>
                    <td></td>
                    <td></td>
                </tr>  
                <tr>
                    <td>{{$sacramentalMeeting->desob_nome1}}</td>
                    <td>{{$sacramentalMeeting->desob_cham1}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->desob_nome2}}</td>
                    <td>{{$sacramentalMeeting->desob_cham2}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->desob_nome3}}</td>
                    <td>{{$sacramentalMeeting->desob_cham3}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->desob_nome4}}</td>
                    <td>{{$sacramentalMeeting->desob_cham4}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->desob_nome5}}</td>
                    <td>{{$sacramentalMeeting->desob_cham5}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->desob_nome6}}</td>
                    <td>{{$sacramentalMeeting->desob_cham6}}</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <!--Apoios-->
            <i style="font-size:10px">“[Nome] foi chamado para [cargo] e propomos que seja apoiado. Os que estiverem a favor queiram manifestar-se levantando a mão. Se houver alguém que se oponha, queira manifestar-se."</i>
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <td><b>Apoios</b></td>
                    <td><b>Chamado</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->apoio_nome1}}</td>
                    <td>{{$sacramentalMeeting->apoio_cham1}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->apoio_nome2}}</td>
                    <td>{{$sacramentalMeeting->apoio_cham2}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->apoio_nome3}}</td>
                    <td>{{$sacramentalMeeting->apoio_cham3}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->apoio_nome4}}</td>
                    <td>{{$sacramentalMeeting->apoio_cham4}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->apoio_nome5}}</td>
                    <td>{{$sacramentalMeeting->apoio_cham5}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->apoio_nome6}}</td>
                    <td>{{$sacramentalMeeting->apoio_cham6}}</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <!-- Sacramento -->
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    @foreach ($hinos as $hino)
                    @if ($hino->num == $sacramentalMeeting->hino2)
                    <td><b>Hino sacramental:</b> {{$hino->num}} - {{$hino->nome}}</td> 
                    @endif
                    @endforeach
                </tr>
            </table>

            <!-- Sacerdócio aaronico -->
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <td><b>Abençoando:</b> {{$sacramentalMeeting->sacerdote1}}, {{$sacramentalMeeting->sacerdote2}}</td>
                    <td><b>Distribuindo:</b> 
                        {{$sacramentalMeeting->diacono1}}, 
                        {{$sacramentalMeeting->diacono2}}, 
                        {{$sacramentalMeeting->diacono3}}, 
                        {{$sacramentalMeeting->diacono4}}
                    </td>
                </tr>
            </table>

        </div>

        <!-- Discursantes, hino especial e encerramento -->
        <div class="well well-xs">
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <td><b>1º Discursante:</b> {{$sacramentalMeeting->discursante1}} - ({{$sacramentalMeeting->tempo1}} min)</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>2º Discursante:</b> {{$sacramentalMeeting->discursante2}} - ({{$sacramentalMeeting->tempo2}} min)</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    @foreach ($hinos as $hino)
                    @if ($hino->num == $sacramentalMeeting->hino3)
                    <td><b>Hino especial:</b> {{$hino->num}} - {{$hino->nome}}</td> 
                    @endif
                    @endforeach
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="well well-xs">
            <table class="table table-hover" style="font-size:10px">
                <tr>
                    <td><b>3º Discursante</b> </td>
                    <td><b>Hino</b></td>

                    <td><b>Oração</b></td>
                </tr>
                <tr>
                    <td>{{$sacramentalMeeting->discursante3}} - ({{$sacramentalMeeting->tempo3}} min)</td>
                    <td>
                        @foreach ($hinos as $hino)
                        @if ($hino->num == $sacramentalMeeting->hino4)
                        {{$hino->num}} - {{$hino->nome}} 
                        @endif
                        @endforeach
                    </td>
                    <td>{{$sacramentalMeeting->oracao2}}</td>
                </tr>
            </table>
        </div>         
    </div>
</div>

@endsection