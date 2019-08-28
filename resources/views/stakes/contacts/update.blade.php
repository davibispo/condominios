@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Responder a contato</b></div>

                <div class="panel-body">
                    <table class="table table-striped table-hover" style="font-size: 12px">
                        <tbody>
                            <tr> 
                                <th>{{$userName}} {{$userLastname}}</th>
                                <td>{{$userPhone}}</td>
                                <td>{{$userWard}}/{{$stake}}</td>
                                <td>{{$contact->message_type}}</td>
                                <td>{{date('d/m/Y',strtotime($contact->created_at))}}</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    {{$contact->message}}
                                    <br>
                                    @if ($contact->answer)   
                                    <hr>
                                    <i>{{$contact->answer}}</i>
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                   
                    {!! Form::model($contact,['method'=>'PATCH', 'action'=>['ContactController@update', $contact->id]]) !!}
                        <div class="form-group">
                            <textarea name="answer" placeholder="Resposta" class="form-control"></textarea>
                        </div>
                        {!! Form::submit('Responder', ['class'=>'btn btn-primary btn-sm']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




