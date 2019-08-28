@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                        CONSELHO DE COORDENAÇÃO MACEIÓ
                        <br>
                        <b>AGENDAS DE REUNIÕES</b>
                    </div>
                <div class="panel-body">
                    {!! Form::open(['method'=>'POST','action'=>'ConselorController@meetingStore','class'=>'form-horizontal']) !!}
                    <table class="table table-hover" style="font-size:12px">
                        
                        <tr>
                            <td><b>Data</b> {!! Form::date('data',null, ['class'=>'form-control', 'required']) !!}</td>
                            <td><b>Reunião</b> 
                                {!! Form::select('reuniao',[
                                    'Conselho de Coordenação'=>'Conselho de Coordenação',
                                    'Conselho de Coordenação c/ Especialistas'=>'Conselho de Coordenação c/ Especialistas',
                                    'Devocional'=>'Devocional',
                                    'Outra' => 'Outra',
                                    ],
                                null, ['class'=>'form-control', 'required']) !!}</td>
                            <td><b>Presidida e dirigida por</b> {!! Form::text('presidindo',null, ['class'=>'form-control']) !!}</td>
                        </tr>

                        <!--Presidentes de Estaca Presentes na reunião-->
                        <tr>
                            <td colspan="3">
                                <a data-toggle="collapse" href="#collapsePresentes">
                                    <i class="fas fa-plus fa-xs"></i>
                                </a> 
                                <b>Presidentes de Estaca/Distrito presentes na Reunião</b> 
                            </td>
                        </tr>
                        <tbody id="collapsePresentes" class="panel-collapse collapse">        
                        <tr>
                            <td style="width:25%">{!! Form::text('participante1',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado1',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao1',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante2',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado2',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao2',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante3',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado3',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao3',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante4',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado4',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao4',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante5',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado5',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao5',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante6',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado6',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao6',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante7',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado7',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao7',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante8',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado8',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao8',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante9',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado9',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao9',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante10',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado10',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao10',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        </tbody>
                        
                        <!--Especialistas Presentes na reunião-->
                        <tr>
                            <td colspan="3">
                                <a data-toggle="collapse" href="#collapseEspecialistas">
                                    <i class="fas fa-plus fa-xs"></i>
                                </a> 
                                <b>Especialistas presentes na Reunião</b> 
                            </td>
                        </tr>
                        <tbody id="collapseEspecialistas" class="panel-collapse collapse">        
                        <tr>
                            <td style="width:25%">{!! Form::text('participante11',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado11',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao11',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante12',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado12',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao12',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante13',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado13',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao13',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante14',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado14',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao14',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante15',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado15',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao15',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante16',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado16',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao16',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante17',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado17',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao17',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante18',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado18',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao18',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante19',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado19',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao19',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <td style="width:25%">{!! Form::text('participante20',null, ['placeholder'=>'Nome','class'=>'form-control']) !!}</td>
                            <td style="width:25%">{!! Form::text('chamado20',null, ['placeholder'=>'Chamado','class'=>'form-control']) !!}</td>
                            <td style="width:50%">{!! Form::text('participacao20',null, ['placeholder'=>'Participação','class'=>'form-control']) !!}</td>
                        </tr>
                        </tbody>
                    </table>
                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="ata">Ata da Reunião</label>
                            <textarea name="ata" rows="20" class="form-control"></textarea> 
                        </div>
                    </div>
                                        
                    <div class="text-center">
                    {!! Form::submit('Salvar Agenda', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
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