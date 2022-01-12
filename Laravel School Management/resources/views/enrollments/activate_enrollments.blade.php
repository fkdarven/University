<script>
    function ConfirmAuthorisation()
    {
        return confirm('Tem certeza desta ação?');
    }
</script>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center">Matrículas pendentes</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Mais informações</th>
                            <th>Autorizar</th>
                        </tr>
                        @foreach($students as $student)
                        @foreach($student->courses as $enrollments)
                        @if($enrollments->pivot->is_authorised==0)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $enrollments->name }}</td>
                            <?php $enroll = $enrollments->pivot->id ?>
                            <td>
                                {!! Form::open(['url' => "/enrollments/$enroll",'method' => 'patch',
                                'onsubmit' => 'return ConfirmAuthorisation()']) !!}
                                {!! Form::submit('Autorizar',['id' => 'enroll-button', "class" => 'btn btn-outline-warning'])!!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @endforeach
                        {{ $students->links()}}

                    </table>
                </main>
            </div>
        </div>
        @endsection
