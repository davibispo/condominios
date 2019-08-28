@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        CONSELHO DE COORDENAÇÃO MACEIÓ
                        <br>
                        <b>ARQUIVOS DO CONSELHO</b>
                    </div>

                <div class="panel-body">
                    
                        <a href="{{route('conselor.index')}}" class="btn btn-default btn-xs">
                            <i class="fas fa-angle-left"></i> voltar
                        </a>
                    
                        <button data-toggle="collapse" data-target="#demo" class="btn btn-xs btn-danger">Enviar Arquivo</button>
                        <div id="demo" class="collapse">
                            <div class="well"> 
                            {!! Form::open(['method'=>'POST', 'action'=>'ConselorController@fileStore', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
                                <input type="file" name="arquivo" class="form-control"><br>
                                Nome do arquivo 
                                <input type="text" name="descricao" class="form-control" required><br>
                                {!! Form::submit('Enviar Arquivo', ['class'=>'btn btn-primary btn-xs']) !!}
                            {!! Form::close() !!}
                            </div>
                        </div>
                    
  
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Arquivos disponíveis</th>
                            <th>Download</th>
                        </tr>
                        @forelse($arquivos as $arquivo)
                        <tr>
                            <td>
                                {!! $arquivo->nome !!}
                            </td>
                            <td>
                                <a href="{{$arquivo->destino}}" target="_blank"><i class="fas fa-download"></i></a> 
                            </td>
                        </tr>
                       
                        @empty
                        <div class="alert">
                            <p>Não existem arquivos disponíveis!</p>
                        </div>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
