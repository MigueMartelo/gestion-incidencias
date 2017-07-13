@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        Hola <strong>{{ Auth::User()->name }}</strong>
    </div>
</div>
@endsection
