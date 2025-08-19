<!doctype html>
<html lang="es" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'GLR · Gestionador TI')</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Carga CSS del layout con Vite -->
  @vite('resources/css/layout.css')
  @stack('styles')
</head>
<body class="bg-body text-body">
  <div class="container container-app py-3">

    <!-- HEADER -->
    <header class="app-header d-flex justify-content-between align-items-center flex-wrap gap-2 pb-2">
      <a href="{{ route('dashboard') }}" class="brand d-flex align-items-center gap-2 text-decoration-none">
        <img src="{{ asset('img/logo-glr.png') }}" alt="GLR" onerror="this.replaceWith(document.createTextNode('GLR'))">
        <span class="brand-title">Grupo Lopez Rosa</span>
      </a>

      

      <div class="d-flex align-items-center gap-2">
        @auth
          <div class="dropdown">
            <button class="btn btn-ghost rounded-circle position-relative" data-bs-toggle="dropdown" aria-expanded="false" title="Sesión iniciada">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                <circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.6"/>
                <path d="M4 20c1.5-3.5 5-5 8-5s6.5 1.5 8 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
              </svg>
              <span class="status-dot"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li class="dropdown-header">Hola, {{ Auth::user()->name }}</li>
              <li><a class="dropdown-item" href="#">Perfil</a></li>
              <li><a class="dropdown-item" href="#">Ajustes</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Cerrar sesión
                </a>
              </li>
            </ul>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        @endauth

        <!-- Switch tema (siempre visible) -->
        <button id="themeSwitch" type="button" class="theme-switch" onclick="toggleThemeFancy()" aria-label="Cambiar tema" title="Tema">
          <span class="knob">
            <svg class="moon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/>
            </svg>
            <svg class="sun" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <circle cx="12" cy="12" r="5"></circle>
              <g stroke="currentColor" stroke-width="2" fill="none">
                <path d="M12 1v3M12 20v3M4.2 4.2l2.1 2.1M17.7 17.7l2.1 2.1M1 12h3M20 12h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1"/>
              </g>
            </svg>
          </span>
        </button>
      </div>
    </header>

    <hr class="my-3">
    <main>@yield('content')</main>

    <footer class="pt-4">
      <p class="text-secondary small mb-0">© {{ date('Y') }} GLR · Minimal, rápido y responsivo</p>
    </footer>
  </div>

  <!-- ICONOS (ojito) -->
  <svg style="display:none">
    <symbol id="i-eye" viewBox="0 0 24 24" fill="none">
      <path d="M2.036 12.322a1 1 0 0 1 0-.644C3.423 7.51 7.254 5 12 5s8.577 2.51 9.964 6.678a1 1 0 0 1 0 .644C20.577 16.49 16.746 19 12 19S3.423 16.49 2.036 12.322Z" stroke="currentColor" stroke-width="1.6"/>
      <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6"/>
    </symbol>
    <symbol id="i-eye-off" viewBox="0 0 24 24" fill="none">
      <path d="M3 3l18 18" stroke="currentColor" stroke-width="1.6"/>
      <path d="M9.88 4.49C10.57 4.18 11.28 4 12 4c4.75 0 8.58 2.51 9.96 6.68a1 1 0 0 1 0 .64c-.61 1.83-1.75 3.36-3.2 4.52" stroke="currentColor" stroke-width="1.6"/>
      <path d="M6.73 6.73C4.76 7.86 3.3 9.63 2.04 12.32a1 1 0 0 0 0 .64C3.42 16.49 7.25 19 12 19c1.13 0 2.22-.15 3.24-.43" stroke="currentColor" stroke-width="1.6"/>
      <path d="M10.59 10.59A3 3 0 0 0 13.41 13.4" stroke="currentColor" stroke-width="1.6"/>
    </symbol>
  </svg>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Carga JS del layout con Vite -->
  @vite('resources/js/ui.js')

  @stack('scripts')
</body>
</html>
