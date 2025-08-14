<!doctype html>
<html lang="es" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Auth · GLR</title>

  <!-- Bootstrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .auth-grid{min-height:72vh}
    .logo-big{max-width:90%;opacity:.95}
    .border-split{border-left:1px solid var(--bs-border-color)}
    @media (max-width: 992px){ .border-split{border-left:0} }
  </style>

  <script>
    // Tema persistente
    (()=>{ const t=localStorage.getItem('glr-theme')||'dark';
      document.documentElement.setAttribute('data-bs-theme', t); })();
    function toggleTheme(){
      const h=document.documentElement;
      const t=h.getAttribute('data-bs-theme')==='dark'?'light':'dark';
      h.setAttribute('data-bs-theme', t); localStorage.setItem('glr-theme', t);
    }
    // Mostrar/ocultar contraseña
    function togglePwd(id, btn){
      const el=document.getElementById(id);
      el.type = el.type === 'password' ? 'text' : 'password';
      const use = btn.querySelector('use');
      if(use){ use.setAttribute('href', el.type==='password' ? '#eye' : '#eye-slash'); }
    }
  </script>
</head>
<body class="bg-body text-body">
  <div class="container py-3">
    <header class="d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center gap-2 fw-bold">
        <img src="{{ asset('img/logo-glr.png') }}" alt="GLR" style="height:28px">
        <span>Grupo Lopez Rosa</span>
      </div>
      <button class="btn btn-outline-secondary" onclick="toggleTheme()">Tema</button>
    </header>

    <hr class="my-3">

    @yield('content')

    <p class="text-secondary small mt-4 mb-0">© {{ date('Y') }} GLR</p>
  </div>

  <!-- Icons ojito -->
  <svg style="display:none">
    <symbol id="eye" viewBox="0 0 16 16">
      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8"/>
      <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
    </symbol>
    <symbol id="eye-slash" viewBox="0 0 16 16">
      <path d="M13.359 11.238C14.06 10.39 14.647 9.374 15.02 8c-1.07-3.646-4.5-5.5-7.02-5.5a7.1 7.1 0 0 0-2.88.62l8.24 8.118zM2.64 4.76 1.354 3.47l11.176 11.02A7.2 7.2 0 0 1 8 13.5C5.48 13.5 2.05 11.646.98 8c.35-1.198 1.01-2.25 1.86-3.1l-.2-.14z"/>
    </symbol>
  </svg>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
