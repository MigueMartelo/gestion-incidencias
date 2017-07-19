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

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" readonly value="{{ old('email', $user->email) }}">
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña <em>Ingresar solo si se desea modificar.</em></label>
                <input type="text" name="password" class="form-control" value="{{ old('password') }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar Usuario</button>
            </div>
        </form>

        <div class="row">
            <div class="col-md-4">
                <select name="" class="form-control" id="select-project">
                    <option value="">Seleccione proyecto</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="" class="form-control" id="select-level">
                    <option value="">Seleccione nivel</option>
                </select>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary btn-block">Asignar proyecto</button>
            </div>
        </div>
        <br>
        <p>Proyectos asignados</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Nivel</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Proyecto A</td>
                    <td>N1</td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary" title="Editar">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="" class="btn btn-sm btn-danger" title="Eliminar">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
    <script src="/js/admin/users/edit.js"></script>
@endsection