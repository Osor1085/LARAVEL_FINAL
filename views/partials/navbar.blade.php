<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                
                <ul class="navbar-nav navbar-right">

                <li class="nav-item">
                        <form action="{{ url('/home') }}" method="GET" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Iniciar sesión
                            </button>
                        </form>
                    </li>

                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-nav">
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <select id="list-of-projects" class="form-control">
                            @foreach( auth()->user()->list_of_projects as $project)
                                <option value="{{ $project->id}}" @if($project->id==auth()->user()->selected_project_id)selected @endif>{{ $project->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </form>

                </ul>
            </div>
        @endif
    </div>
</nav>