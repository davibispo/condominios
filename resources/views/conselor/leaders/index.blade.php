@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    CONSELHO DE COORDENAÇÃO MACEIÓ
                    <br>
                    <b>LÍDERES REGIONAIS</b>
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
                                <th>SECRETÁRIO DO CONSELHO</th>
                                <td><img src="{!! asset('assets/img/tom.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>ELITON OLIVEIRA</b></p>
                                    <p>ESTACA MACEIÓ LITORAL</p>
                                    <p>(82) 99800-6439  - secretarioconselhodeareamaceio@gmail.com </p>
                                </td>
                                <td>Apoiado em 2012</td>
                            </tr>
                            <tr>
                                <th>ESPECIALISTA DE BEM-ESTAR</th>
                                <td><img src="{!! asset('assets/img/bruno.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>BRUNO VASCONCELOS BARROS</b></p>
                                    <p>ESTACA MACEIÓ</p>
                                    <p>(82) 99973-0639 - brunovasconcelosbarros@gmail.com</p>
                                </td>
                                <td>Apoiado em 2017</td>
                            </tr>
                            <tr>
                                <th>AUDITOR ASSISTENTE DA ÁREA</th>
                                <td><img src="{!! asset('assets/img/galvao.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>SÉRGIO DA SILVA GALVÃO</b></p>
                                    <p></p>
                                    <p>(82) 99972-0702 - galvaoss@ldschurch.org</p>
                                </td>
                                <td>Apoiado em 2017</td>
                            </tr>
                            <tr>
                                <th>ESPECIALISTA EM TECNOLOGIA</th>
                                <td><img src="{!! asset('assets/img/davi.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>DAVI BISPO DE OLIVEIRA</b></p>
                                    <p>ESTACA MACEIÓ TABULEIRO</p>
                                    <p>(82) 99969-3407 - davi-bispo@hotmail.com</p>
                                </td>
                                <td>Apoiado em 2017</td>
                            </tr>
                            <tr>
                                <th>CONSULTOR DO TEMPLO E HISTÓRIA DA FAMÍLIA</th>
                                <td><img src="{!! asset('assets/img/josualdo.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>JOSUALDO DOS SANTOS MOTA</b></p>
                                    <p>ESTACA MACEIÓ LITORAL</p>
                                    <p>(82) 99131-9003 - 9188mota@gmail.com</p>
                                </td>
                                <td>Apoiado em 2017</td>
                            </tr>
                            <tr>
                                <th>CONSULTOR DO TEMPLO E HISTÓRIA DA FAMÍLIA</th>
                                <td><img src="{!! asset('assets/img/modelo.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>MÁRCIA DO NASCIMENTO MOTA</b></p>
                                    <p>ESTACA MACEIÓ LITORAL</p>
                                    <p>(82) 99131-9003 - 9188mota@gmail.com</p>
                                </td>
                                <td>Apoiado em 2018</td>
                            </tr>
                            <tr>
                                <th>DIRETORA DE ASSUNTOS PÚBLICOS</th>
                                <td><img src="{!! asset('assets/img/ruth.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>RUTH DE CARVALHO ROMÃO DE MELO</b></p>
                                    <p>ESTACA MACEIÓ TABULEIRO</p>
                                    <p>(82) 98721-5712</p>
                                </td>
                                <td>Apoiado em 2013</td>
                            </tr>

                            <tr>
                                <th>RESPONSÁVEL PELO MAS</th>
                                <td><img src="{!! asset('assets/img/soares.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>JOSÉ SOARES DA SILVA</b></p>
                                    <p>ESTACA MACEIÓ TABULEIRO</p>
                                    <p>(82) </p>
                                </td>
                                <td>Apoiado em </td>
                            </tr>
                            <tr>
                                <th>RESPONSÁVEL PELO MAS</th>
                                <td><img src="{!! asset('assets/img/esposa-soares.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>MARIA JOSÉ DE LIMA SOARES</b></p>
                                    <p>ESTACA MACEIÓ TABULEIRO</p>
                                    <p>(82) </p>
                                </td>
                                <td>Apoiado em </td>
                            </tr>
                            <tr>
                                <th>LÍDER DO JAS</th>
                                <td><img src="{!! asset('assets/img/jorge.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>JORGE ANDRÉ AMORIM</b></p>
                                    <p>ESTACA</p>
                                    <p>(82) </p>
                                </td>
                                <td>Apoiado em </td>
                            </tr>
                            <tr>
                                <th>LÍDER DO JAS</th>
                                <td><img src="{!! asset('assets/img/modelo.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>RITA DE CASSIA SANTOS AMORIM</b></p>
                                    <p>ESTACA</p>
                                    <p>(82) </p>
                                </td>
                                <td>Apoiado em </td>
                            </tr>
                            <tr>
                                <th>GERENTE DE AUTOSSUFICIÊNCIA</th>
                                <td><img src="{!! asset('assets/img/modelo.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>DÍNIO TEODORO DE GÓES</b></p>
                                    <p>ESTACA MACEIÓ</p>
                                    <p>(82) 99402-9969</p>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>COORDENADOR DO SEMINÁRIO</th>
                                <td><img src="{!! asset('assets/img/modelo.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>JOSÉ RODRIGUES DA COSTA JÚNIOR</b></p>
                                    <p></p>
                                    <p>(82) 99980-6216 - costajuniorjr@ldschurch.org</p>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>DIRETOR DO INSTITUTO</th>
                                <td><img src="{!! asset('assets/img/pres-frazio.png') !!}" class="img-circle" width="80"></td>
                                <td>
                                    <p><b>FRÁZIO VALDEZ TENÓRIO CAVALCANTE</b></p>
                                    <p>ESTACA MACEIÓ</p>
                                    <p>(82) 99985-1507</p>
                                </td>
                                <td></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection