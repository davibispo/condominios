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
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome completo" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                {!! Form::select('tipo', 
                                    [
                                        'Proprietário'      => 'Proprietário (Responsável)', 
                                        'Inquilino'         => 'Inquilino (Responsável)', 
                                        'Apenas Morador'    => 'Apenas Morador', 
                                        'Outro'             => 'Outro', 
                                    ], 
                                    null, ['class' => 'form-control', 'required', 'placeholder' => '-- Escolha --']) 
                                !!}   
                                @if ($errors->has('tipo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Bloco e apto -->
                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label for="tipo" class="col-md-4 control-label">Unidade</label>

                            <div class="col-md-6">
                                {!! Form::select('bloco',
                                    [
                                    '1'=>'1',   
                                    '2'=>'2',   
                                    '3'=>'3',   
                                    '4'=>'4',   
                                    '5'=>'5',   
                                    '6'=>'6',   
                                    '7'=>'7',   
                                    '8'=>'8',   
                                    '9'=>'9',   
                                    '10'=>'10',   
                                    '11'=>'11',   
                                    '12'=>'12',   
                                    '13'=>'13',   
                                    '14'=>'14',   
                                    '15'=>'15',   
                                    '16'=>'16',   
                                    '17'=>'17',   
                                    '18'=>'18',   
                                    '19'=>'19',   
                                    '20'=>'20',   
                                    '21'=>'21',   
                                    '22'=>'22',   
                                    ],
                                    null, ['class' => 'form-control', 'required', 'placeholder' => '-- Bloco --'])     
                                !!}
                                {!! Form::select('apto', 
                                    [
                                    '001'=>'001',
                                    '002'=>'002',
                                    '003'=>'003',
                                    '004'=>'004',
                                    '101'=>'101',
                                    '102'=>'102',
                                    '103'=>'103',
                                    '104'=>'104',
                                    '201'=>'201',
                                    '202'=>'202',
                                    '203'=>'203',
                                    '204'=>'204',
                                    '301'=>'301',
                                    '302'=>'302',
                                    '303'=>'303',
                                    '304'=>'304',
                                    's/u'=>'s/u',
                                    ],
                                    null, ['class' => 'form-control', 'required', 'placeholder' => '-- Apartamento --']) 
                                !!}
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
                        <!--cpf-->
                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <label for="cpf" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" maxlength="11" class="form-control" name="cpf" value="{{ old('cpf') }}" placeholder="digite apenas números" required autofocus>

                                @if ($errors->has('cpf'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dt_nasc') ? ' has-error' : '' }}">
                            <label for="dt_nasc" class="col-md-4 control-label">Nascimento</label>

                            <div class="col-md-6">
                                <input id="dt_nasc" type="date" class="form-control" name="dt_nasc" value="{{ old('dt_nasc') }}" required autofocus>

                                @if ($errors->has('dt_nasc'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dt_nasc') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                            <label for="phone1" class="col-md-4 control-label">Telefone 1</label>

                            <div class="col-md-6">
                                <input type="tel" name="phone1" value="{{ old('phone1') }}" class="form-control" placeholder="82999998888" required autofocus>
                                @if ($errors->has('phone1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                            <label for="phone2" class="col-md-4 control-label">Telefone 2</label>

                            <div class="col-md-6">
                                <input type="tel" name="phone2" value="{{ old('phone2') }}" class="form-control" placeholder="82999998888" autofocus>
                                @if ($errors->has('phone2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label for="foto" class="col-md-4 control-label">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                {!! Form::file('foto', null, ['class' => 'form-control']) !!}  
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('residentes') ? ' has-error' : '' }}">
                            <label for="residentes" class="col-md-4 control-label">Residente com</label>

                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tr>
                                        <td width="70%">{!! Form::text('residente1', null, ['class' => 'form-control', 'placeholder'=>'Nome']) !!} </td>
                                        <td>{!! Form::number('idade_residente1', null, ['class' => 'form-control', 'min'=>'1', 'max'=>'110', 'placeholder'=>'Idade']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{!! Form::text('residente2', null, ['class' => 'form-control', 'placeholder'=>'Nome']) !!}</td>
                                        <td>{!! Form::number('idade_residente2', null, ['class' => 'form-control', 'placeholder'=>'Idade']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{!! Form::text('residente3', null, ['class' => 'form-control', 'placeholder'=>'Nome']) !!}</td>
                                        <td>{!! Form::number('idade_residente3', null, ['class' => 'form-control', 'placeholder'=>'Idade']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{!! Form::text('residente4', null, ['class' => 'form-control', 'placeholder'=>'Nome']) !!}</td>
                                        <td>{!! Form::number('idade_residente4', null, ['class' => 'form-control', 'placeholder'=>'Idade']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{!! Form::text('residente5', null, ['class' => 'form-control', 'placeholder'=>'Nome']) !!}</td>
                                        <td>{!! Form::number('idade_residente5', null, ['class' => 'form-control', 'placeholder'=>'Idade']) !!}</td>
                                    </tr>
                                </table>
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
                                    Cadastrar
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
