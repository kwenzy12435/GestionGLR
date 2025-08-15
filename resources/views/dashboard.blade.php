@extends('layouts.app')
@section('title','Dashboard · Gestionador TI')

@section('content')
@push('styles')
  @vite('resources/css/features/dashboard.css') {{-- CSS específico del dashboard --}}
@endpush

<div class="d-flex align-items-baseline justify-content-between mb-3">
  <h1 class="display-6 fw-bold mb-0">Dashboard</h1>
  <a href="" class="btn btn-brand">+ Nueva laptop</a>
</div>

{{-- KPIs --}}
<div class="row g-3">
  <div class="col-xl-3 col-md-6">
    <div class="kpi card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="kpi-icon">
          <svg viewBox="0 0 24 24"><path d="M3 5h18v11H3zM1 18h22v1H1z"/></svg>
        </div>
        <div class="flex-grow-1">
          <div class="kpi-label">Laptops</div>
          <div class="kpi-value">128</div>
          <div class="kpi-trend text-success">+4 este mes</div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6">
    <div class="kpi card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="kpi-icon">
          <svg viewBox="0 0 24 24"><path d="M7 4h10v4H7zM3 10h18v10H3z"/></svg>
        </div>
        <div class="flex-grow-1">
          <div class="kpi-label">Dispositivos</div>
          <div class="kpi-value">342</div>
          <div class="kpi-trend text-success">+12</div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6">
    <div class="kpi card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="kpi-icon">
          <svg viewBox="0 0 24 24"><path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5ZM3 21a9 9 0 0 1 18 0"/></svg>
        </div>
        <div class="flex-grow-1">
          <div class="kpi-label">Usuarios</div>
          <div class="kpi-value">57</div>
          <div class="kpi-trend text-muted">—</div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6">
    <div class="kpi card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="kpi-icon">
          <svg viewBox="0 0 24 24"><path d="M4 4h16v4H4zM4 10h10v4H4zM4 16h7v4H4z"/></svg>
        </div>
        <div class="flex-grow-1">
          <div class="kpi-label">Tickets abiertos</div>
          <div class="kpi-value">9</div>
          <div class="kpi-trend text-danger">+2</div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Contenido principal --}}
<div class="row g-3 mt-1">
  <div class="col-lg-8">
    <div class="card card-elev p-3">
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Últimos movimientos</h5>
        <a href="#" class="btn btn-sm btn-outline-brand">Ver todos</a>
      </div>
      <div class="table-responsive mt-2">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th>Fecha</th><th>Tipo</th><th>Descripción</th><th class="text-end">Estado</th>
            </tr>
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
  </div>

  <div class="col-lg-4">
    <div class="card card-elev p-3">
      <h5 class="mb-3">Estado de equipos</h5>
      <div class="mb-2 small d-flex justify-content-between"><span>Operativos</span><span>78%</span></div>
      <div class="progress mb-3">
        <div class="progress-bar bg-brand" style="width:78%"></div>
      </div>
      <div class="mb-2 small d-flex justify-content-between"><span>En mantenimiento</span><span>15%</span></div>
      <div class="progress mb-3">
        <div class="progress-bar bg-brand-700" style="width:15%"></div>
      </div>
      <div class="mb-2 small d-flex justify-content-between"><span>Baja</span><span>7%</span></div>
      <div class="progress">
        <div class="progress-bar bg-secondary" style="width:7%"></div>
      </div>
    </div>

    <div class="card card-elev p-3 mt-3">
      <h5 class="mb-3">Tareas rápidas</h5>
      <div class="d-grid gap-2">
        <a class="btn btn-brand" href="">+ Nueva laptop</a>
        <a class="btn btn-outline-brand" href="">Inventario de laptops</a>
        <a class="btn btn-outline-secondary" href="#">Reportes</a>
      </div>
    </div>
  </div>
</div>
@endsection
