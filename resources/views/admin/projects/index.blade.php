@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif


        <form action="" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="name" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label for="star">Fecha de inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', date('Y-m-d')) }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Registrar proyecto</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $projects as $project )
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start ?: 'No se ha indicado' }}</td>
                    <td>

                        @if ($project->trashed())
                        <a href="/proyecto/{{ $project->id }}" class="btn btn-sm btn-primary disabled" title="Editar">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="/proyecto/{{ $project->id }}/restaurar" class="btn btn-sm btn-success" title="Restaurar">
                            <span class="glyphicon glyphicon-ok"></span>
                        </a>
                        @else
                        <a href="/proyecto/{{ $project->id }}" class="btn btn-sm btn-primary" title="Editar">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="/proyecto/{{ $project->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


