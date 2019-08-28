@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Caravanas da Estaca {{$stake}}</b></div>

                <div class="panel-body">
                    <div>
                        <a href="{{route('caravans.create')}}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Criar Caravana
                        </a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Data</th>
                                <th>Líder da caravana</th> 
                                <th>Telefone</th> 
                                <th>Tipo</th> 
                                <th>Ativar</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($caravans as $caravan)
                            <tr>
                                <td style="font-size:9px">{{ $caravan->id }}</td>
                                <td><b>{{date('d/m/Y', strtotime($caravan->data))}}</b></td>
                                <td>{{$caravan->leader}}</td>
                                <td>{{$caravan->phone}}</td>
                                <td>
                                    @if ($caravan->status == 0)
                                        Dia
                                    @else
                                        Semana
                                    @endif 
                                </td>
                                <td>
                                    @if ($caravan->ativo == 1)

                                        <a href="{{ route('caravans.ativar', $caravan->id) }}"><i class="fas fa-toggle-on" style="color:green"></i></a>
                                    @else

                                        <a href="{{ route('caravans.ativar', $caravan->id) }}"><i class="fas fa-toggle-off" style="color:red"></i></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('caravans.show', $caravan->id)}}" class="btn btn-info btn-xs">Detalhes</a>
                                    <a href="{{route('caravans.edit', $caravan->id)}}" class="btn btn-warning btn-xs">Editar</a>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['CaravanController@destroy', $caravan->id], 'style'=>'display:inline']) !!}
                                        {!! Form::submit('Excluir', ['class'=>'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty
                        <div class=" well alert-warning">
                            <p>Não tem caravanas criadas!</p>
                        </div>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


