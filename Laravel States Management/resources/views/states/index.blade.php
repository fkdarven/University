@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Estados Cadastrados
                    <a href="/states/create" class="float-right btn btn-outline-primary">Novo Estado</a>
                    <a href="/cities/create" class="float-right btn btn-outline-secondary" id="state">Nova Cidade</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-light" style="text-align: center">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sigla</th>
                            <th>Nº Habitantes</th>
                            <th>Ferramentas</th>
                        </tr>
                        @foreach($states as $state)
                            <tr>
                                <td>{{ $state->id }}</td>
                                <td>{{ $state->name }}</td>
                                <td>{{ $state->initials }}</td>
                                <td>{{ $state->total_citizens }}</td>
                                <td>
                                <div id="buttons">
                                    <a href="/states/{{ $state->id }}/edit" class="btn btn-outline-light" id="edit">Editar</a>
                                    {!! Form::open(['url' => "/states/$state->id", 'method' => 'delete']) !!}
                                    {!! Form::submit('Deletar',['class'=>'btn btn-outline-light'],['id'=>'delete-button'])!!}
                                    {!! Form::close() !!}   
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
