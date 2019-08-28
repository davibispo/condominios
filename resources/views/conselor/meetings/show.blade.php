@extends('layouts.print-version')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        CONSELHO DE COORDENAÇÃO MACEIÓ
                        <br>
                        <b>AGENDA DE REUNIÃO</b>
                    </div>

                <div class="panel-body">
                    <div class="text-right">
                    <a onclick="javascript:window.print();" class="btn btn-link btn-xs">
                        <i class="fas fa-print fa-xs"></i>
                        impressão
                    </a>
                    </div>
                
                    <table class="table table-striped" style="font-size:12px ">
                        <tr>
                            <th>Data</th>
                            <th>Reunião</th>
                            <th>Presidida e dirigida por</th>
                        </tr>
                        <tr>
                            <td>{!! date('d/m/Y', strtotime($agenda->data)) !!}</td>
                            <td>{!! $agenda->reuniao !!}</td>
                            <td>{!! $agenda->presidindo !!}</td>
                        </tr>
                        <tr>
                            <th colspan="3">Presentes na Reunião</th>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante1 !!} - {!! $agenda->chamado1 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao1 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante2 !!} - {!! $agenda->chamado2 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao2 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante3 !!} - {!! $agenda->chamado3 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao3 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante4 !!} - {!! $agenda->chamado4 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao4 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante5 !!} - {!! $agenda->chamado5 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao5 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante6 !!} - {!! $agenda->chamado6 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao6 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante7 !!} - {!! $agenda->chamado7 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao7 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante8 !!} - {!! $agenda->chamado8 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao8 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante9 !!} - {!! $agenda->chamado9 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao9 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante10 !!} - {!! $agenda->chamado10 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao10 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante11 !!} - {!! $agenda->chamado11 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao11 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante12 !!} - {!! $agenda->chamado12 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao12 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante13 !!} - {!! $agenda->chamado13 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao13 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante14 !!} - {!! $agenda->chamado14 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao14 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante15 !!} - {!! $agenda->chamado15 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao15 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante16 !!} - {!! $agenda->chamado16 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao16 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante17 !!} - {!! $agenda->chamado17 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao17 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante18 !!} - {!! $agenda->chamado18 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao18 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante19 !!} - {!! $agenda->chamado19 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao19 !!}</td>
                        </tr>
                        <tr>
                            <td style="width:40%">{!! $agenda->participante20 !!} - {!! $agenda->chamado20 !!}</td>
                            <td colspan="2" style="width:60%">{!! $agenda->participacao20 !!}</td>
                        </tr>

                        <tr>
                            <th colspan="3" style="text-align: center"><h4>Ata da Reunião</h4></th>
                        </tr>
                        <tr>
                            <td colspan="3"><p>{!! $agenda->ata !!}</p></td>
                        </tr>
                                
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas(); });
</script>