<div class="panel panel-primary">
    <div class="panel-heading">Menú</div>

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
        	@if (auth()->check())
	        	<li><a href="#">Dashboard</a></li>
	        	<li><a href="#">Ver incidencias</a></li>
	        	<li><a href="#">Reportar incidencias</a></li>
	        	<li><a href="#">Administración</a></li>
        	@else
	        	<li><a href="#">Bienvenido</a></li>
	        	<li><a href="#">instrucciones</a></li>
	        	<li><a href="#">Créditos</a></li>
        	@endif
        </ul>
    </div>
</div>

