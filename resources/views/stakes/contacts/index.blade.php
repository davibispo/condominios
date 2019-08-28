@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Mensagens enviadas</b></div>
    
                <div class="panel-body">
                    <div class="perfil">
                        @forelse ($contacts as $contact)
                            @foreach ($users as $user)
                                @if ($contact->user_id == $user->id)
                                    <table class="table table-striped well">
                                        <tbody>
                                            <tr>
                                                <td>
                                                @can('contact_update')
                                                <b>{{$user->name}} {{$user->lastname}}</b> - {{$user->phone}} - {{$user->ward}}/{{$user->stake}} - 
                                                @endcan
                                                <b>{{$contact->message_type}}</b> - {{date('d/m/Y',strtotime($contact->created_at))}}
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{$contact->message}}
                                                    @if ($contact->answer)   
                                                    <hr>
                                                    <font color="green"><b>Resposta:</b>
                                                        <i>{{$contact->answer}}</i>
                                                    </font>
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    @can('contact_update')
                                                    <a href="{{route('contacts.edit', $contact->id)}}" data-toggle="tooltip" title="Responder">
                                                        <i class="fas fa-comment fa-lg"></i>
                                                    </a>  
                                                   
                                                    {!! Form::open(['method'=>'DELETE', 'action'=>['ContactController@destroy', $contact->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('x', ['class'=>'btn btn-danger btn-xs', 'data-toggle'=>'tooltip', 'title'=>'Excluir']) !!}
                                                    {!! Form::close() !!}
                                                    @endcan
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            @endforeach
                            @empty
                            <div class="alert alert-warning">
                                <p>Não há mensagens enviadas!</p>
                            </div>   
                        @endforelse
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection