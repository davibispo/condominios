@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    CONSELHO DE COORDENAÇÃO MACEIÓ
                    <br>
                    <b>ESTACAS/DISTRITOS</b>
                </div>

                <div class="panel-body">
                    <div class="text-left">
                        <a href="{{route('conselor.index')}}" class="btn btn-default btn-xs">
                            <i class="fas fa-angle-left"></i> voltar
                        </a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <td>
                                    <b>MACEIÓ BRASIL COLINA</b><br>
                                    R. Santa Luzia, S/N - Tabuleiro do Martins <br>
                                    57060-150 Maceió - AL
                                </td>
                                <td><img src="{!! asset('assets/img/pres-messias.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <b>PRES. MANOEL MESSIAS</b><br>
                                    82 98756-9898 <br>
                                    messias_glicomed@hotmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>MACEIÓ BRASIL LITORAL</b><br>
                                    R. Dom Adelmo Machado, 160 - Ponta Grossa <br>
                                    51015-000 Maceió - AL
                                </td>
                                <td><img src="{!! asset('assets/img/pres-pedro.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <b>PRES. MARCOS PEDRO</b><br>
                                    82 98859-3349 <br>
                                    macpedro8@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>MACEIÓ BRASIL PAJUÇARA</b><br>
                                    R. Valdomiro Nunes De A. Barros, 116 - Jacintinho <br>
                                    57041-000 Maceió - AL
                                </td>
                                <td><img src="{!! asset('assets/img/modelo.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <b>PRES. DÍNIO GÓES</b><br>
                                    82 99402-9969 <br>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>MACEIÓ BRASIL</b><br>
                                    Av. Santa Rita de Cássia, 287 - Farol <br>
                                    57051-600 Maceió - AL
                                </td>
                                <td><img src="{!! asset('assets/img/pres-frazio.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <b>PRES. FRAZIO TENÓRIO</b><br>
                                    82 99985-1507 <br>
                                    tenorio_@hotmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>MACEIÓ BRASIL TABULEIRO</b><br>
                                    R. Carlos Francisco de Farias, 105 - Tabuleiro <br>
                                    57082-320 Maceió - AL
                                </td>
                                <td><img src="{!! asset('assets/img/pres-genival.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <b>PRES. GENIVAL DOS SANTOS</b><br>
                                    82 99950-6765 <br>
                                    genivalsantos1998@hotmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>ARAPIRACA BRASIL</b><br>
                                    R. Pedro Nunes de Albuquerque, 277 - Centro <br>
                                    57300-550 Arapiraca - AL
                                </td>
                                <td><img src="{!! asset('assets/img/pres-jailson.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <b>PRES. JAILSON OLIVEIRA</b><br>
                                    82 99931-5098 <br>
                                    jailsonroliveira@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>ARACAJÚ BRASIL NORTE</b><br>
                                    Rua São Jorge n°606 - Santos Dumont <br>
                                    49087-560 Aracaju - SE
                                </td>
                                <td><img src="{!! asset('assets/img/pres-piedade.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <b>PRES. LUIZ PIEDADE</b><br>
                                    79 99964-6782 <br>
                                    luizhumberto.sud@hotmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>ARACAJÚ BRASIL SUL</b><br>
                                    Av: Gonçalo Rolembergue Leite nº 1633 - Grageru <br>
                                    49025-230 Aracaju - SE
                                </td>
                                <td><img src="{!! asset('assets/img/pres-prado.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <b>PRES. RUBENS PRADO</b><br>
                                    79 99660-0070 <br>
                                    bispo.prado@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>DISTRITO LAGARTO</b><br>
                                    Rua Otaviano Siqueira,299, Bairro Alagoas - Centro <br>
                                    49200-000 Estância - SE
                                </td>
                                <td><img src="{!! asset('assets/img/pres-manoel.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <b>PRES. MANOEL BATISTA</b><br>
                                    79 99950-9061 <br>
                                    manoelbatistasantos@yahoo.com.br
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection