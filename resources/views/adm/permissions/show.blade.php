@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Permissões</div>

                <div class="panel-body">
                    <div class="form-group">
                        <b>Nome: </b>{{$permission->name}}
                    </div>
                    <div class="form-group">
                        <b>Description: </b>{{$permission->description}}
                    </div>
                    <div class="form-group">
                        <b>Criado em: </b>{{date('d-m-Y', strtotime($permission->created_at))}} 
                    </div>
                    <div class="form-group">
                        <b>Atualizado em: </b>{{date('d-m-Y',strtotime($permission->updated_at))}} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
