@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar-se</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Primeiro nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="ou nome composto" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Sobrenomes</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!--sexo-->
                        <div class="form-group">
                        <label for="genre" class="col-md-4 control-label">Sexo</label>
                            <div class="col-md-6">
                                <select name='genre' class='form-control'required>
                                    <option> -- Escolha o sexo -- </option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                        </div>  
                        <!--rg-->
                        <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                            <label for="rg" class="col-md-4 control-label">RG</label>

                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control" name="rg" value="{{ old('rg') }}" placeholder="ou Registro Nasc.(últimos 10 números)" required autofocus>

                                @if ($errors->has('rg'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rg') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('orgao_exp') ? ' has-error' : '' }}">
                            <label for="orgao_exp" class="col-md-4 control-label">Órgão Expeditor/UF</label>

                            <div class="col-md-6">
                                <input id="orgao_exp" type="text" class="form-control" name="orgao_exp" value="{{ old('orgao_exp') }}" required autofocus>

                                @if ($errors->has('orgao_exp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('orgao_exp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dt_nasc') ? ' has-error' : '' }}">
                            <label for="dt_nasc" class="col-md-4 control-label">Data de Nascimento</label>

                            <div class="col-md-6">
                                <input id="dt_nasc" type="date" class="form-control" name="dt_nasc" value="{{ old('dt_nasc') }}" required autofocus>

                                @if ($errors->has('dt_nasc'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dt_nasc') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="82999998888" equired autofocus>
                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('uf') ? ' has-error' : '' }}">
                            {!! Form::label('uf', 'UF', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <select name="uf" id="uf" class="form-control" required>
                                    <option value="">-- Escolha o Estado --</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            {!! Form::label('city', 'Cidade', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <select name="city" id="cidade" class="form-control" style="display:none;" required></select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('stake') ? ' has-error' : '' }}">
                            <label for="stake" class="col-md-4 control-label">Estaca</label>

                            <div class="col-md-6">
                                <select name="stake" id="stake" class="form-control" value="{{ old('stake') }}" required autofocus>
                                    <option value="">-- Escolha a Estaca --</option>
                                </select>

                                @if ($errors->has('stake'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('stake') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ward') ? ' has-error' : '' }}">
                            <label for="ward" class="col-md-4 control-label">Ala/Ramo</label>

                            <div class="col-md-6">
                                <select name="ward" id="ward" class="form-control" style="display:none;" value="{{ old('ward') }}" required autofocus></select>

                                @if ($errors->has('ward'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ward') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="mínimo 6 caracteres" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
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

