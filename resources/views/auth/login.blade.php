@extends('layouts.app')
@php($auth = true)

@section('title', 'Login · Gestionador TI')

@section('content')
<div class="row auth-grid g-4 align-items-center">
  <!-- Col izq -->
  <div class="col-lg-6">
    <h1 class="display-2 fw-bold mt-0 mb-2 lh-2">Gestionador TI</h1>
    <h2 class="h1 fw-bold mt-3">Iniciar sesión</h2>

    @if ($errors->any())
      <div class="alert alert-danger mt-3">
        @foreach ($errors->all() as $e) <div>• {{ $e }}</div> @endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}" class="mt-3" style="max-width: 520px">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Correo electronico</label>
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required placeholder="Correo electronico">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <div class="input-group">
          <input id="password" name="password" type="password" class="form-control" required placeholder="••••••••">
          <button class="btn btn-outline-secondary" type="button"
                  onclick="togglePwd('password', this)" data-on="#i-eye" data-off="#i-eye-off"
                  aria-label="Mostrar/ocultar contraseña">
            <svg width="18" height="18"><use href="#i-eye"></use></svg>
          </button>
        </div>
      </div>

      <button class="btn btn-primary w-100" type="submit">Entrar</button>

      <div class="d-flex gap-3 mt-3 small">
        <a href="{{ route('register') }}" class="link-secondary">Crear cuenta</a>
        <a href="#" class="link-secondary" onclick="alert('Recuperación pendiente');return false;">¿Olvidaste tu contraseña?</a>
      </div>
    </form>
  </div>

  <!-- Col der: logo grande -->
  <div class="col-lg-6 split-line text-center">
    <img src="{{ asset('img/logo-glr.png') }}" alt="GLR" class="logo-big img-fluid">
  </div>
</div>
@endsection
