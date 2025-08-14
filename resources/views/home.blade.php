@extends('layouts.app')

@section('content')
  <h1 style="margin:0 0 8px 0;">Dashboard</h1>
  <div style="color:var(--M);margin-bottom:6px">Resumen de tus módulos</div>

  <div class="grid">
    @foreach ($stats as $k => $v)
      <a class="card" href="#">
        <div class="k">{{ $k }}</div>
        <div class="v">{{ number_format($v) }}</div>
      </a>
    @endforeach
  </div>
@endsection
