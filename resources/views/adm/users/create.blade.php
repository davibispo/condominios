@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Adicionar Novo Usuário</b></div>

                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'UserController@store', 'class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Primeiro Nome', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lastname', 'Sobrenomes', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('lastname', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('genre', 'Sexo', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('genre', 
                                [
                                'M' => 'Masculino', 
                                'F' => 'Feminino', 
                                ], 
                                null, ['class' => 'form-control', 'placeholder' => '-- Escolha o sexo --']) 
                            !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('rg', 'RG', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('rg', null, ['class' => 'form-control','placeholder'=>'ou Registro Nasc.(últimos 10 números)', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('orgao_exp', 'Órgão Exp. e UF', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('orgao_exp', null, ['class' => 'form-control', 'placeholder'=>'SSP AL', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('dt_nasc', 'Data Nasc.', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::date('dt_nasc', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', 'Telefone', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            <input type="tel" name="phone" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('uf', 'UF', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            <select name="uf" id="uf" class="form-control" required>
                                <option value="">-- Escolha o Estado --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('city', 'Cidade', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            <select name="city" id="cidade" class="form-control" style="display:none;" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('stake', 'Estaca', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            <select name="stake" id="stake" class="form-control" required>
                                <option value="">-- Escolha a Estaca --</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('ward', 'Ala/Ramo', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            <select name="ward" id="ward" class="form-control" style="display:none;" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Senha', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::password('password', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password-confirm', 'Confirmar Senha', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::password('password_confirmation', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<!-- Script para trazer os estados e cidades nos selects -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
//verificar
        $.ajax({
            url: 'https://gist.githubusercontent.com/letanure/3012978/raw/36fc21d9e2fc45c078e0e0e07cce3c81965db8f9/estados-cidades.json'
            , type: 'GET'
            , dataType: 'json'
            , cache: true
            , success: function (json) {
                //Fala que o json a Var global json (window.json) é json
                window.json = json;

                var seletorUf = $("#uf");
                for (i in json.estados) {
                    var estado = json.estados[i];
                    $("<option />", {value: estado.sigla, text: estado.nome}).appendTo(seletorUf);
                }
            }
            , error: function (json) {
                //console.log(json);
            }
        });

        $("#uf").bind("change", function () {
            var ufSelecionado = $(this).val();

            var selectCidades = $("#cidade");
            selectCidades.empty();
            selectCidades.show();

        //Percorre todo o Loop de estados
            for (i in json.estados) {
                var estado = json.estados[i];

                //Caso a sigla seja a mesma selecionada
                if (estado.sigla === ufSelecionado) {
                    for (x in estado.cidades) {
                        var cidade = estado.cidades[x];
                        $("<option />", {value: x.cidades, text: cidade}).appendTo(selectCidades);
                    }

                    //Break loop (Improve performace?)
                    return false;
                }
            }
        });
    });
  
    //script para os selects das estacas e alas
    $(document).ready(function () {
        //verificar
        $.ajax({
            url: 'https://gist.githubusercontent.com/davibispo/280e4c58786d298dd21038a21ec55fdc/raw/6892f99d8662a8cd3d4dd943f3972b9a4fa11619/estacas-alas.json',
            type: 'GET',
            dataType: 'json',
            cache: true,
            success: function (json) {
                //Fala que o json a Var global json (window.json) é json
                window.json1 = json;

                var seletorStake = $("#stake");
                for (j in json1.estacas) {
                    var estaca = json1.estacas[j];
                    $("<option />", {value: estaca.nome, text: estaca.nome}).appendTo(seletorStake);
                }
            }
            , error: function (json) {
                //console.log(json);
            }
        });

        $("#stake").bind("change", function () {
            var stakeSelecionado = $(this).val();

            var selectWards = $("#ward");
            selectWards.empty();
            selectWards.show();

            //Percorre todo o Loop de estacas
            for (j in json1.estacas) {
                var estaca = json1.estacas[j];

                //Caso a sigla seja a mesma selecionada
                if (estaca.nome === stakeSelecionado) {
                    for (y in estaca.alas) {
                        var ala = estaca.alas[y];
                        $("<option />", {value: y.alas, text: ala}).appendTo(selectWards);
                    }

                    //Break loop (Improve performace?)
                    return false;
                }
            }
        });
    });
</script>

