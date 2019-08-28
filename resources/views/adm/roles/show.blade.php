@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Perfis</div>

                <div class="panel-body">
                    <div class="form-group">
                        <b>Nome: </b>{{$role->name}}
                    </div>
                    <div class="form-group">
                        <b>Description: </b>{{$role->description}}
                    </div>
                    <div class="form-group">
                        <b>Criado em: </b>{{date('d-m-Y', strtotime($role->created_at))}} 
                    </div>
                    <div class="form-group">
                        <b>Atualizado em: </b>{{date('d-m-Y',strtotime($role->updated_at))}} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
