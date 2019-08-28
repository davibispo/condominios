@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Reservar Vaga em Caravana da Estaca {{$stake}}</b></div>
                <div class="panel-body">
                    <div>
                        <a href="{{route('caravan-users.index')}}" class="btn btn-default btn-xs text-left"><i class="fas fa-angle-left"></i> voltar</a>
                        <h4 class="text-center">Caravana de <b>{{date('d-m-Y', strtotime($caravan->data))}}</b></h4>
                        <p class="text-center"><i class="fas fa-bus fa-lg"></i> Escolha uma poltrona!</p>
                    </div>

                    {!! Form::open(['method'=>'POST', 'action'=>['CaravanUserController@store', $caravan->id], 'class'=>'form-horizontal']) !!}
                    {!! Form::hidden('caravan_id', $caravan->id) !!}
                    {!! Form::hidden('user_id', $userId) !!}
                    {!! Form::hidden('status', '1') !!}
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
                    
                    <div>
                        <p class="text-center">Após clicar no botão abaixo, verifique se seu nome consta na lista.</p>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            {!! Form::submit('Reservar Sua Vaga', ['class'=>'btn btn-success']) !!}
                        </div>
                    </div>
                    
                    {!! Form::close() !!}

                    <table class="table">
                        <tr>
                            <td>
                            
                                <div class="text-left">
                                    {!! Form::open(['method'=>'POST', 'action'=>['CaravanUserController@store', $caravan->id], 'class'=>'form-horizontal']) !!}
                                    {!! Form::hidden('caravan_id', $caravan->id) !!}
                                    {!! Form::hidden('user_id', $userId) !!}
                                    {!! Form::hidden('poltrona', '0') !!}
                                    {!! Form::hidden('status', '2') !!}
                                    {!! Form::submit('Desejo ficar na Lista Reserva', ['class'=>'btn btn-warning']) !!}
                                    {!! Form::close() !!}
                                </div>
                            
                            </td>
                            <td>
                                <div class="text-right">
                                    <a href="{{route('caravan-users.create-caravan-user-kid', $caravan->id)}}" class="btn btn-info">Reservar Vaga para Outra Pessoa</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


