<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> 
          <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Seguimiento</span> </a>
            <div class="nav_list"> 
              {{-- <a href="#" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>  --}}
              <a href="{{route('usuarios.index')}}" class="nav_link @if (Route::currentRouteName() == 'usuarios.index') active @endif"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Usuarios</span> </a> 
              <a href="{{route('journeys-x-day')}}" class="nav_link @if (Route::currentRouteName() == 'journeys-x-day') active @endif">  <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Reporte x Dias</span> </a> 
              <a href="{{route('by-technical')}}" class="nav_link @if (Route::currentRouteName() == 'by-technical') active @endif"> <i class='bx bx-map-alt nav_icon'></i> <span class="nav_name">Reporte x tecnico</span> </a> 
              {{-- <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Estadisticas</span> </a>  --}}
            </div>
        </div> 
        <a href="{{route('logout')}}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Salir</span> </a>
    </nav>
</div>