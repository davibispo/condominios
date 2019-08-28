@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Detalhes do Usuário</b></div>

                <div class="panel-body">
                    <div class="form-group">
                        <b>Nome: </b>{{$user->name}}
                    </div>
                    <div class="form-group">
                        <b>Sobrenome: </b>{{$user->lastname}}
                    </div>
                    <div class="form-group">
                        <b>Sexo: </b>{{$user->genre}}
                    </div>
                    <div class="form-group">
                        <b>RG: </b>{{$user->rg}}
                    </div>
                    <div class="form-group">
                        <b>Órgão Exp.: </b>{{$user->orgao_exp}}
                    </div>
                    <div class="form-group">
                        <b>Data de Nascimento: </b>{{date('d-m-Y', strtotime($user->dt_nasc))}}
                    </div>
                    <div class="form-group">
                        <b>Idade: </b>{{$idade}} anos
                    </div>
                    <div class="form-group">
                        <b>Telefone: </b>{{$user->phone}}
                    </div>
                    <div class="form-group">
                        <b>E-mail: </b>{{$user->email}}
                    </div>
                    <div class="form-group">
                        <b>UF: </b>{{$user->uf}}
                    </div>
                    <div class="form-group">
                        <b>Cidade: </b>{{$user->city}}
                    </div>
                    <div class="form-group">
                        <b>Estaca: </b>{{$user->stake}}
                    </div>
                    <div class="form-group">
                        <b>Ala/Ramo: </b>{{$user->ward}}
                    </div>
                    <div class="form-group">
                        <b>Criado em: </b>{{date('d-m-Y', strtotime($user->created_at))}} 
                    </div>
                    <div class="form-group">
                        <b>Atualizado em: </b>{{date('d-m-Y',strtotime($user->updated_at))}} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
