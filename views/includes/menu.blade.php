<div class="panel panel-primary">
    <div class="panel-heading">Menú</div>
        <div class="panel-body">
            <div class="list-group">
                @if(auth()->check())
                    <a href="/home" class="list-group-item">
                        Dashboards
                    </a>

                        <!--
                    {{-- @if (! auth()->user()->is_client) --}}
				{{-- <li @if(request()->is('ver')) class="active" @endif> --}}
				{{-- <a href="/ver">Ver incidencias</a> --}}
				{{-- </li> --}}
				{{-- @endif --}}

				<li @if(request()->is('reportar')) class="active" @endif>
					<a href="/reportar">Reportar incidencia</a>
				</li> -->


                    <!--Se definen  accesor para identificar el rol del usuario-->
                    @if(! auth()->user()->is_client)
                    <a href="/ver" class="list-group-item">
                        Ver incidencias
                    </a>
                    @endif
                    <a href="/reportar" class="list-group-item">
                        Reportar Incidencias
                    </a>
                
                    @if(auth()->user()->is_admin)
                        <a role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" hre="#" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                Administración <span class="caret"></span>
                             </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/usuarios">Usuario</a></li>
                                    <li><a href="/proyectos">Proyectos</a></li>
                                    <li><a href="/config">Configuracion</a></li>
                                </ul>
                            </a>
                        </a>
                    @endif
                @else
                    <a href="#" class="list-group-item">
                        Bienvenido
                    </a>
                    <a href="#" class="list-group-item">
                        Instrucciones
                    </a>
                    <a href="#" class="list-group-item">
                        Créditos
                    </a>
                @endif
            </div>
        </div>
</div>
