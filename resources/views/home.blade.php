@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">

		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Incidencias asignada a mí</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Categoría</th>
							<th>Severidad</th>
							<th>Estado</th>
							<th>Fecha creación</th>
							<th>Resumen</th>
						</tr>
					</thead>
					<tbody id="dashboard_my_incidents"></tbody>
				</table>
			</div>
		</div>

		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Incidencias por asignar</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Categoría</th>
							<th>Severidad</th>
							<th>Estado</th>
							<th>Fecha creación</th>
							<th>Resumen</th>
							<th>opción</th>
						</tr>
					</thead>
					<tbody id="dashboard_no_responsible"></tbody>
				</table>
			</div>
		</div>

		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Incidencias asignadas a otros</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Categoría</th>
							<th>Severidad</th>
							<th>Estado</th>
							<th>Fecha creación</th>
							<th>Resumen</th>
							<th>Responsable</th>
						</tr>
					</thead>
					<tbody id="dashboard_to_others"></tbody>
				</table>
			</div>
		</div>

    </div>
</div>
@endsection
