@extends('layouts.app')
@php($auth = true)

@section('title', 'Crear cuenta · Gestionador TI')

@section('content')
<div class="row auth-grid g-4 align-items-center">
  <div class="col-lg-6">
   <h1 class="display-2 fw-bold mt-0 mb-2 lh-2">Gestionador TI</h1>
    <h2 class="h1 fw-bold mt-3">Crear Cuentas</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $e) <div>• {{ $e }}</div> @endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('register.post') }}" style="max-width: 560px">
      @csrf
      <div class="row g-3">
        <div class="col-md-6">
          <label for="name" class="form-label">Nombre</label>
          <input id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Correo</label>
          <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="col-md-6">
          <label for="reg_password" class="form-label">Contraseña</label>
          <div class="input-group">
            <input id="reg_password" name="password" type="password" class="form-control" required>
            <button class="btn btn-outline-secondary" type="button"
                    onclick="togglePwd('reg_password', this)" data-on="#i-eye" data-off="#i-eye-off">
              <svg width="18" height="18"><use href="#i-eye"></use></svg>
            </button>
          </div>
        </div>
        <div class="col-md-6">
          <label for="reg_password_confirmation" class="form-label">Confirmar contraseña</label>
          <div class="input-group">
            <input id="reg_password_confirmation" name="password_confirmation" type="password" class="form-control" required>
            <button class="btn btn-outline-secondary" type="button"
                    onclick="togglePwd('reg_password_confirmation', this)" data-on="#i-eye" data-off="#i-eye-off">
              <svg width="18" height="18"><use href="#i-eye"></use></svg>
            </button>
          </div>
        </div>
      </div>

      <!-- sin 'rol', lo asigna el admin -->
      <button class="btn btn-primary w-100 mt-3" type="submit">Crear cuenta</button>

      <div class="mt-3 small">
        ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
      </div>
    </form>
  </div>

  <div class="col-lg-6 split-line text-center">
    <img src="{{ asset('img/logo-glr.png') }}" alt="GLR" class="logo-big img-fluid">
  </div>
</div>
@endsection
