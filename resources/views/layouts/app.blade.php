<!doctype html>
<html lang="es" data-bs-theme="dark">
<head>
   @stack('styles')
  <!-- META -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'GLR · Gestionador TI')</title>
   
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- ESTILOS -->
  <style>
    /* ===== BASE ===== */
    .container-app { max-width: 1200px; }

    /* ===== HEADER (logo/título un poco más grandes) ===== */
    .app-header { background: var(--bs-body-bg); }
    .brand img { height: 36px; }                /* antes ~28px */
    .brand span { font-weight: 800; font-size: 1.15rem; letter-spacing:.2px; }

    /* ===== NAV (se oculta en vistas de auth con $auth=true) ===== */
    .app-nav .btn { border-radius: 999px; }

    /* ===== SWITCH DAY/NIGHT — compacto ===== */
    .theme-switch{
      position:relative; width:65px; height:38px; border-radius:999px;
      background:#2b3035; display:inline-flex; align-items:center; padding:6px;
      cursor:pointer; user-select:none; border:1px solid var(--bs-border-color);
    }
    .theme-switch .knob{
      position:absolute; top:6px; left:6px; width:28px; height:28px;
      border-radius:50%; background:#fff; display:grid; place-items:center; transition:left .25s ease;
    }
    .theme-switch .text{position:absolute; left:46px; right:10px; font-weight:700; font-size:12px; letter-spacing:.5px; color:#fff}
    .theme-switch svg{width:18px; height:18px; color:#111}
    [data-bs-theme="light"] .theme-switch{background:#e9ecef;}
    [data-bs-theme="light"] .theme-switch .knob{left:calc(100% - 34px);}
    [data-bs-theme="light"] .theme-switch .text{color:#212529; left:10px; right:46px;}
    .theme-switch .sun{display:none;}
    [data-bs-theme="light"] .theme-switch .sun{display:block;}
    [data-bs-theme="light"] .theme-switch .moon{display:none;}

    /* ===== FORM acabado ===== */
    .form-control, .btn { border-radius: 12px; }
    .input-group .btn { border-radius: 12px; }

    /* ===== VISTAS AUTH (dos columnas + línea vertical) ===== */
    .auth-grid { min-height: 70vh; }
    .split-line { border-left: 1px solid var(--bs-border-color); }
    .logo-big { max-width: 90%; opacity: .95; }
    @media (max-width: 992px) { .split-line { border-left: 0; } }
  </style>

  <!-- SCRIPTS -->
  <script>
    // Persistencia del tema
    (() => {
      const KEY='glr-theme';
      function apply(t){
        document.documentElement.setAttribute('data-bs-theme', t);
        localStorage.setItem(KEY, t);
        const btn=document.getElementById('themeSwitch');
        if(btn){
          btn.setAttribute('aria-pressed', t==='dark'?'true':'false');
          const txt=btn.querySelector('.text'); if(txt) txt.textContent = t==='dark'?'NIGHTMODE':'DAYMODE';
        }
      }
      window.toggleThemeFancy = () => {
        const cur = document.documentElement.getAttribute('data-bs-theme') || 'dark';
        apply(cur==='dark' ? 'light' : 'dark');
      };
      document.addEventListener('DOMContentLoaded', ()=>apply(localStorage.getItem(KEY)||'dark'));
    })();

    // Ojito de contraseña (ícono bonito)
    function togglePwd(id, btn){
      const el=document.getElementById(id);
      const wasPass = el.type==='password';
      el.type = wasPass ? 'text' : 'password';
      const use = btn?.querySelector('use');
      if(use){
        const on  = btn.getAttribute('data-on')  || '#i-eye';
        const off = btn.getAttribute('data-off') || '#i-eye-off';
        use.setAttribute('href', el.type==='password' ? on : off);
      }
    }
  </script>
</head>

<body class="bg-body text-body">
  @stack('scripts')
  <div class="container container-app py-3">

    <!-- HEADER -->
    <header class="app-header d-flex justify-content-between align-items-center flex-wrap gap-2 pb-0">
      <div class="brand d-flex align-items-center gap-2">
        <!-- Cambia el nombre si tu archivo no es logo_glr.png -->
        <img src="{{ asset('img/logo-glr.png') }}" alt="GLR" onerror="this.replaceWith(document.createTextNode('GLR'))"  style="height:56px; width:auto;">
        <span class="fw-bold fs-3">Grupo Lopez Rosa</span>
      </div>

      @if(empty($auth))
      
      @endif

      <button id="themeSwitch" type="button" class="theme-switch" onclick="toggleThemeFancy()" aria-label="Cambiar tema">
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
    </header>

    <hr class="my-3">

    <!-- CONTENIDO -->
    <main>@yield('content')</main>

    <!-- FOOTER -->
    <footer class="pt-4">
      <p class="text-secondary small mb-0">© {{ date('Y') }} GLR · Grupo Lopez Rosa</p>
    </footer>
  </div>

  <!-- ICONOS del ojo -->
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
</body>
</html>
