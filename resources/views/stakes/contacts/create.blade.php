@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Suporte do Sistema SiteSUD</b></div>
                
                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'ContactController@store', 'class'=>'form-horizontal']) !!}
                        
                    <div class="form-group">
                        {!! Form::label('message_type', 'Assunto Principal', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('message_type', [
                                'Dúvida'=>'Dúvida',
                                'Sugestão'=>'Sugestão',
                                'Reclamação'=>'Reclamação',
                            ], null, ['class'=>'form-control','required', 'placeholder'=>' -- Escolha o assunto -- ']) !!}
                        </div>
                    </div>
 
                    <div class="form-group">
                        {!! Form::label('message', 'Mensagem', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            <textarea name="message" class="form-control" required></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Enviar Mensagem', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


