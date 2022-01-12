<script>
	function ConfirmTurnAdmin()
	{
		return confirm('Tem certeza desta ação?');
	}
</script>
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-18">
			<div class="card">
				<div class="card-header" style="text-align:center">Alunos e matrículas</div>
				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif
					<table class="table" style="text-align: center">
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>CPF</th>
							<th>RG</th>
							<th>Endereço</th>
							<th>Telefone</th>
							<th>Email</th>
							<th>Cursos Matriculados</th>
							<th>Tornar Administrador</th>
						</tr>
						@foreach($students as $student)
						<tr>
							<td> {{$student->id}}</td>
							<td> {{$student->name}}</td>
							<td> {{$student->cpf}}</td>
							<td> {{$student->rg}}</td>
							<td> {{$student->address}}</td>
							<td> {{$student->phone}}</td>
							<td> {{$student->email}}</td>
							<td><button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal{{$student->id}}">Visualizar</button></td>
							<td>
								<div id="buttons">
									{!! Form::open(['url' => "/students/$student->id",'method' => 'patch', 'onsubmit' => 'return ConfirmTurnAdmin()']) !!}
									{!! Form::submit('Garantir Acesso',['id' => 'turn_admin-button','class' => 'btn btn-outline-warning'])!!}
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
</div>
@foreach($students as $student)
	<div class="modal fade" id="myModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header"></button>
					<h4 class="modal-title" id="myModalLabel">Informações do Aluno - {{$student->name}}</h4>
				</div>
				<div class="modal-body">
					<div id="body-content">
						@foreach($student->courses as $enrollment)
						<p><b>ID - </b>{{ $enrollment->id }}</p>
						<p><b>Disciplina - </b>{{ $enrollment->name }}</p>
						<p><b>Matrícula Efetivada - </b>
							@if($enrollment->pivot->is_authorised==0)
							Não
							@else
							Sim
							@endif

						</p>
						<div id="buttons">

							{!! Form::open(['url' => "enrollments/$enrollment->id",'method' => 'delete', 'onsubmit' => 'return ConfirmTurnAdmin()']) !!}
								{!! Form::submit('Deletar Matrícula',['id' => 'delete_enrollment','class' => 'btn btn-outline-danger']) !!}
							{!! Form::close() !!}
						</div>
						<hr>
						@endforeach
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
@endforeach
@endsection
