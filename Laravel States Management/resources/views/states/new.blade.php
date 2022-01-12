@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Novo Estado                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-light" style="text-align: center"
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/states', 'method' => 'post','class' => 'form-group col-10']) !!}
                        
                        {{ Form::label('name', 'Nome',['class'=>'col-sm-2 col-form-label' ])}}
                        {{ Form::text('name',null,['class' => 'form-control col-3','required']) }}

                        @if ($errors->has('name'))
                            <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                        @endif

                        {{ Form::label('initials', 'Sigla',['class'=>'col-sm-2 col-form-label']) }}
                        {{ Form::text('initials',null,['class' => 'form-control col-3','required']) }}

                        @if ($errors->has('initials'))
                            <div class="error" style="color: red">{{ $errors->first('initials') }}</div>
                        @endif

                        <br /><br />

                        {{ Form::submit('Salvar',['class'=>'btn btn-outline-success col-2']) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
