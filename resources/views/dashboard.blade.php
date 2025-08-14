@extends('layouts.app')
@section('content')
  <h1>Bienvenido, {{ $me->name }} <span class="k">({{ $me->rol }})</span></h1>
  <form method="POST" action="{{ route('logout') }}" style="margin-top:10px">
    @csrf
    <button class="btn" type="submit">Cerrar sesión</button>
  </form>
@endsection
