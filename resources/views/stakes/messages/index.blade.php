@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading"><b>Mensagem da Presidência da Estaca {{$stake}}</b></div>
                
                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'MessageController@store']) !!}
                        
                    <div class="form-group">
                        {!! Form::label('message', 'Digite uma Mensagem de 450 caracteres') !!}
                        <div>
                            <textarea name="message" id="message" rows="4" class="form-control" onkeyup="mostrarResultado(this.value,450,'spcontando');contarCaracteres(this.value,450,'sprestante')" placeholder="Esta mensagem aparecerá na página inicial. Pode ser um aviso, anúncio especial, uma escritura etc..." required></textarea>
                            <span id="spcontando">Ainda não temos nada digitado..</span><br />
                            <span id="sprestante"></span>
                        </div>                        
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Postar Mensagem', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


