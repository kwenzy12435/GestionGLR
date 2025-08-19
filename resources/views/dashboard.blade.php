@extends('layouts.app')
@section('title','Dashboard · Gestionador TI')

@section('content')
@push('styles')
  @vite('resources/css/features/dashboard.css')
  {{-- Si NO estás usando Vite todavía, comenta la línea de arriba y descomenta esta: --}}
  {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
@endpush

{{-- ===== Top bar interna del dashboard (hamburguesa + tabs + CTA) ===== --}}
<div class="d-flex align-items-center justify-content-between mb-3">
  <div class="d-flex align-items-center gap-2">
    <button class="btn btn-outline-secondary rounded-3" data-bs-toggle="offcanvas" data-bs-target="#appMenu" aria-controls="appMenu" title="Menú">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M3 6h18v2H3zM3 11h18v2H3zM3 16h18v2H3z"/></svg>
    </button>
    <h1 class="display-6 fw-bold mb-0">Dashboard</h1>
  </div>
  {{-- Tabs y CTA eliminados --}}
</div>


{{-- ===== Bloque de KPIs (al estilo de la imagen) ===== --}}
<div class="row g-3 mb-2">
  @php($kpis = [
    ['LAPTOPS','128','+4 este mes'],
    ['DISPOSITIVOS','342','+12'],
    ['USUARIOS','57','—'],
    ['TICKETS ABIERTOS','9','+2'],
  ])
  @foreach($kpis as $k)
  <div class="col-xxl-3 col-md-6 reveal">
    <div class="card kpi-tile border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="kpi-icon"><svg viewBox="0 0 24 24"><path d="M4 4h16v4H4zM4 10h10v4H4zM4 16h7v4H4z"/></svg></div>
        <div class="flex-grow-1">
          <div class="kpi-label">{{ $k[0] }}</div>
          <div class="d-flex align-items-end gap-2">
            <div class="kpi-value">{{ $k[1] }}</div>
            <div class="kpi-trend text-success small">{{ $k[2] }}</div>
          </div>
        </div>
        <button class="btn btn-sm btn-outline-secondary rounded-3">Ver</button>
      </div>
    </div>
  </div>
  @endforeach
</div>

{{-- ===== 8 botones de acceso rápido ===== --}}
<div class="row g-3 mb-3">
  @php($quick = [
    ['Laptops','#'],['Dispositivos','#'],['Cuentas TI','#'],['AnyDesk','#'],
    ['Reportes','#'],['Departamentos','#'],['Empleados','#'],['Ubicaciones','#'],
  ])
  @foreach($quick as $q)
  <div class="col-xxl-3 col-md-6 col-lg-3 col-sm-6 reveal">
    <a href="{{ $q[1] }}" class="quick-card text-decoration-none">
      <div class="qc-icon"><svg viewBox="0 0 24 24"><path d="M4 4h16v4H4zM4 10h10v4H4zM4 16h7v4H4z"/></svg></div>
      <div class="qc-title">{{ $q[0] }}</div>
      <div class="qc-more">Próximamente</div>
    </a>
  </div>
  @endforeach
</div>

{{-- ===== Contenido principal (2 tablas + estado + tareas) ===== --}}
<div class="row g-3">
  <div class="col-lg-8">
    <!-- Últimos movimientos (1) -->
    <div class="card card-elev p-3 mb-3 reveal">
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Últimos movimientos</h5>
        <a href="#" class="btn btn-sm btn-outline-brand">Ver todos</a>
      </div>
      <div class="table-responsive mt-2">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr><th>Fecha</th><th>Tipo</th><th>Descripción</th><th class="text-end">Estado</th></tr>
          </thead>
          <tbody>
            <tr>
              <td>2025-08-12</td><td>Asignación</td><td>GLR-001 a Juan P.</td>
              <td class="text-end"><span class="badge rounded-pill bg-brand-soft text-brand">Completado</span></td>
            </tr>
            <tr>
              <td>2025-08-11</td><td>Mantenimiento</td><td>Cambio SSD GLR-115</td>
              <td class="text-end"><span class="badge rounded-pill bg-warning-subtle text-warning-emphasis">Pendiente</span></td>
            </tr>
            <tr>
              <td>2025-08-09</td><td>Baja</td><td>Laptop GLR-099</td>
              <td class="text-end"><span class="badge rounded-pill bg-danger-subtle text-danger-emphasis">Observación</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Últimos movimientos (2) -->
    <div class="card card-elev p-3 reveal">
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Últimos movimientos</h5>
        <a href="#" class="btn btn-sm btn-outline-brand">Ver todos</a>
      </div>
      <div class="table-responsive mt-2">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr><th>Fecha</th><th>Tipo</th><th>Descripción</th><th class="text-end">Estado</th></tr>
          </thead>
          <tbody>
            <tr>
              <td>2025-08-12</td><td>Asignación</td><td>GLR-010 a María L.</td>
              <td class="text-end"><span class="badge rounded-pill bg-brand-soft text-brand">Completado</span></td>
            </tr>
            <tr>
              <td>2025-08-10</td><td>Mantenimiento</td><td>Actualización RAM GLR-077</td>
              <td class="text-end"><span class="badge rounded-pill bg-warning-subtle text-warning-emphasis">Pendiente</span></td>
            </tr>
            <tr>
              <td>2025-08-08</td><td>Baja</td><td>Laptop GLR-055</td>
              <td class="text-end"><span class="badge rounded-pill bg-danger-subtle text-danger-emphasis">Observación</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <div class="col-lg-4">
    <!-- Estado de equipos -->
    <div class="card card-elev p-3 mb-3 reveal">
      <h5 class="mb-3">Estado de equipos</h5>
      <div class="mb-2 small d-flex justify-content-between"><span>Operativos</span><span>78%</span></div>
      <div class="progress mb-3"><div class="progress-bar bg-brand" style="width:78%"></div></div>

      <div class="mb-2 small d-flex justify-content-between"><span>En mantenimiento</span><span>15%</span></div>
      <div class="progress mb-3"><div class="progress-bar bg-brand-700" style="width:15%"></div></div>

      <div class="mb-2 small d-flex justify-content-between"><span>Baja</span><span>7%</span></div>
      <div class="progress"><div class="progress-bar bg-secondary" style="width:7%"></div></div>
    </div>

    <!-- Tareas rápidas -->
    <div class="card card-elev p-3 reveal">
      <h5 class="mb-3">Tareas rápidas</h5>
      <div class="d-grid gap-2">
        <a class="btn btn-brand" href="#">+ Nueva laptop</a>
        <a class="btn btn-outline-brand" href="#">Inventario de laptops</a>
        <a class="btn btn-outline-secondary" href="#">Reportes</a>
      </div>
    </div>
  </div>
</div>

{{-- ===== Offcanvas: menú lateral con 12 apartados ===== --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="appMenu" aria-labelledby="appMenuLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title d-flex align-items-center gap-2" id="appMenuLabel">
      <span class="dot-brand"></span> Menú
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
  </div>
  <div class="offcanvas-body p-0">
    <nav class="menu-list">
      @php($items = [
        ['Dashboard','#'],['Laptops','#'],['Dispositivos','#'],['Cuentas TI','#'],
        ['AnyDesk','#'],['Reportes','#'],['Departamentos','#'],['Empleados','#'],
        ['Marcas','#'],['Ubicaciones','#'],['Mantenimientos','#'],['Configuración','#'],
      ])
      @foreach($items as $it)
        <a href="{{ $it[1] }}" class="menu-item">
          <svg viewBox="0 0 24 24"><path d="M4 4h16v4H4zM4 10h10v4H4zM4 16h7v4H4z"/></svg>
          <span>{{ $it[0] }}</span>
        </a>
      @endforeach
    </nav>
    <hr class="my-0">
<div class="offcanvas-footer p-3">
  <div class="d-flex align-items-center gap-2">
    <div class="avatar bg-brand-soft text-brand rounded-circle d-flex justify-content-center align-items-center">
  <svg class="avatar-icon" viewBox="0 0 24 24" fill="none">
    <circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.6"/>
    <path d="M4 20c1.5-3.5 5-5 8-5s6.5 1.5 8 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
  </svg>
</div>
    <div class="small">
      <div class="fw-bold">{{ Auth::user()->name ?? 'Usuario' }}</div>
      <div class="text-secondary">Sesión iniciada</div>
    </div>
  </div>
  <div class="mt-2">
    <a href="#" class="btn btn-sm btn-outline-secondary w-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      Cerrar sesión
    </a>
  </div>
</div>
  </div>
</div>
@endsection
