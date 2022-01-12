@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header" style="text-align:center">Disciplinas Quais Estou Matrículado</div>
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
							<th>Matrícula efetivada</th>
						</tr>
						@foreach($students->courses as $enrollment)
						<tr>
							<td>{{ $enrollment->id }}</td>
							<td>{{ $enrollment->name }}</td>
							@if($enrollment->pivot->is_authorised==0)
							<td>Não</td>
							@else
							<td>Sim</td>
							@endif
						</tr>
						@endforeach
						
					</table>	
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection










