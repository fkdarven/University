@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cidades Cadastradas
                    <a href="/cities/create" class="float-right btn btn-outline-primary">Nova Cidade</a>
                    <a href="/states/create" class="float-right btn btn-outline-secondary" id="state">Novo Estado</a>
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
                            <th>Estado</th>
                            <th>Nº Habitantes</th>
                            <th>Ferramentas</th>
                        </tr>
                        @foreach($cities as $city)
                        
                        <tr>
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->states->name}}</td>
                                <td>{{ $city->citizens }}</td>
                                <td>
                                <div id="buttons">
                                    <a href="/cities/{{ $city->id }}/edit" class="btn btn-outline-light" id="edit">Editar</a>
                                    {!! Form::open(['url' => "/cities/$city->id", 'method' => 'delete']) !!}
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
