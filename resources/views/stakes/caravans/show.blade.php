@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Detalhes da Caravana</b></div>

                <div class="panel-body">
                    <div>
                        <a href="{{route('caravans.index')}}" class="btn btn-default btn-xs">
                            <i class="fas fa-angle-left"></i> voltar
                        </a>
                    </div>
                    <br>
                    <div class="well">
                        <div class="form-group">
                            <b>Data da caravana: </b>{{date('d-m-Y',strtotime($caravan->data))}}
                        </div>
                        <div class="form-group">
                            <b>Líder da caravana: </b>{{$caravan->leader}}
                        </div>
                        <div class="form-group">
                            <b>Telefone do líder: </b>{{$caravan->phone}}
                        </div>
                        <div class="form-group">
                            <b>Valor do ônibus: </b>R$ {{number_format($caravan->bus, 2, ',', ' ')}}
                        </div>
                        <div class="form-group">
                            <b>Valor do Alojamento: </b>R$ {{number_format($caravan->accommodation, 2, ',', ' ')}}
                        </div>
                        <div class="form-group">
                            <b>Observações: </b>{{$caravan->obs}}
                        </div>
                        <div class="form-group">
                            <b>Criado em: </b>{{date('d-m-Y', strtotime($caravan->created_at))}} 
                        </div>
                        <div class="form-group">
                            <b>Atualizado em: </b>{{date('d-m-Y',strtotime($caravan->updated_at))}} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


