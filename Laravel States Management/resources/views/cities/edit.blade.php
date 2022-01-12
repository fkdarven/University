@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Cidade                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-light" style="text-align: center">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => "/cities/$city->id", 'method' => 'put', 'class'=>'form-group col-10']) !!}
                        
                        {{ Form::label('name', 'Nome',['class'=>'col-sm-6 col-form-label']) }}
                        {{ Form::text('name', $city->name, ['class' => 'form-control col-3','required']) }}
                        
                        @if ($errors->has('name'))
                            <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                        @endif

                        {{ Form::label('citizens', 'Nº de Habitantes',['class'=>'col-sm-6 col-form-label']) }}
                        {{ Form::text('citizens', $city->citizens, ['class' => 'form-control col-3','required']) }}
                        
                        @if ($errors->has('citizens'))
                            <div class="error" style="color: red">{{ $errors->first('citizens') }}</div>
                        @endif

                        {{ Form::label('state', 'Estado',['class'=>'col-sm-6 col-form-label']) }}
                        <br/>
                        {!! Form::select('states', $states, $city->state_id, ['class'=>' form-control col-3 btn btn-light dropdown-toggle'])!!}
                        <br/><br/>

                        @if ($errors->has('states'))
                            <div class="error" style="color: red">{{ $errors->first('states') }}</div>
                        @endif
                        
                        {!!Form::submit('Salvar',['class'=>'btn btn-outline-primary col-2'])!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
