@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Reservar Vaga para Outra Pessoa</b> em Caravana da Estaca {{$stake}}</div>
                <div class="panel-body">
                    <div>
                        <a href="{{route('caravan-users.index')}}" class="btn btn-default btn-xs text-left"><i class="fas fa-angle-left"></i> voltar</a>
                        <h4 class="text-center"><i class="fas fa-bus fa-lg"></i> Caravana de <b>{{date('d-m-Y', strtotime($caravan->data))}}</b></h4>
                    </div>
                    <div class="alert alert-danger">
                        <p class="text-center">ATENÇÃO! Ao cadastrar os dados de outra pessoa você estará se responsabilizando pela veracidade.</p>
                    </div>
                    <div class="alert alert-danger">
                        <p>ATENÇÃO! VOCÊ SÓ PODE RESERVAR VAGA DE OUTRA PESSOA QUE PERTENÇA A SUA ALA.</p>
                    </div>

                    {!! Form::open(['method'=>'POST', 'action'=>['CaravanUserController@store', $caravan->id], 'class'=>'form-horizontal']) !!}
                    {!! Form::hidden('caravan_id', $caravan->id) !!}
                    {!! Form::hidden('user_id', $userId) !!}
                    {!! Form::hidden('status', '3') !!}
                    
                    <div class="well">
                        <div class="form-group">
                            {!! Form::label('kid', 'Nome completo', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('kid', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('kid_doc', 'RG', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('kid_doc', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('kid_age', 'Idade', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="kid_age" min="0" max="110" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="well">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    @for($i=3;$i<=50;$i++)
                                    @if (DB::table('caravan_users')->where('ativo','1')->where('poltrona', $i)->where('caravan_id', $caravan->id)->value('poltrona') != $i)
                                    <td style="background-color: green; color:white; width: 50px;">
                                        {{$i}} <input type="radio" name="poltrona" value="{{$i}}" required>
                                    </td>
                                    @else
                                    <td style="background-color: red; color:white; width: 50px;"><i>{{$i}}</i></td>
                                    @endif
                                    @php $i += 3 @endphp
                                    @endfor
                                    <td rowspan="2">WC</td>
                                </tr>
                                <tr>
                                    @for($i=4;$i<51;$i++)
                                    @if (DB::table('caravan_users')->where('ativo','1')->where('poltrona', $i)->where('caravan_id', $caravan->id)->value('poltrona') != $i)
                                    <td style="background-color: green; color:white; width: 50px;">
                                        {{$i}} <input type="radio" name="poltrona" value="{{$i}}" required>
                                    </td>
                                    @else
                                    <td style="background-color: red; color:white; width: 50px;"><i>{{$i}}</i></td>
                                    @endif
                                    @php $i += 3 @endphp
                                    @endfor
                                </tr>
                                <tr>
                                    <td colspan="13"></td>
                                </tr>
                                <tr>
                                    @for($i=2;$i<51;$i++)
                                    @if (DB::table('caravan_users')->where('ativo','1')->where('poltrona', $i)->where('caravan_id', $caravan->id)->value('poltrona') != $i)
                                    <td style="background-color: green; color:white; width: 50px;">
                                        {{$i}} <input type="radio" name="poltrona" value="{{$i}}" required>
                                    </td>
                                    @else
                                    <td style="background-color: red; color:white; width: 50px;"><i>{{$i}}</i></td>
                                    @endif
                                    @php $i += 3 @endphp
                                    @endfor
                                </tr>
                                <tr>
                                    @for($i=1;$i<51;$i++)
                                    @if (DB::table('caravan_users')->where('ativo','1')->where('poltrona', $i)->where('caravan_id', $caravan->id)->value('poltrona') != $i)
                                    <td style="background-color: green; color:white; width: 50px;">
                                        {{$i}} <input type="radio" name="poltrona" value="{{$i}}" required>
                                    </td>
                                    @else
                                    <td style="background-color: red; color:white; width: 50px;"><i>{{$i}}</i></td>
                                    @endif
                                    @php $i += 3 @endphp
                                    @endfor
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <input type="radio" name="poltrona" value="99" required>
                            Colocar nome na <b>Lista Reserva</b>.
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <input type="radio" name="poltrona" value="0" required>
                            <b>Criança</b> Sem poltrona.
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-center">Após clicar no botão abaixo, verifique se o nome consta na lista.</p>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            {!! Form::submit('Finalizar Reserva de Vaga para Outra Pessoa', ['class'=>'btn btn-info']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


