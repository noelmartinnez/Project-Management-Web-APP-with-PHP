@extends('layouts.app')

@section('title', 'UAProjects')

@section('content')
<div class="g6-section g6-header">
  <h1 class="g6-title">Comienza a organizar tus actividades</h1>
  <p class="g6-header_text">
    Crea una cuenta para comenzar a utilizar UAProjects o inicia sesión
    para continuar con tus proyectos. Esperemos que tengas exito en
    todos ellos.
  </p>
  <div class="g6-header_buttons p-4">
    <a class="g6-button g6-button-primary" href="{{ route('register') }}">Unete a nosotros</a>
    <a class="g6-button g6-button-secondary" href="{{ route('login') }}">Iniciar sesión</a>
  </div>
</div>
<div class="g6-section g6-features">
  <h1 class="g6-title">Gestiona tus proyectos</h1>
  <div class="g6-section_content">
    <div class="g6-card">
      <i class="bi bi-check-lg"></i>
      <div class="g6-card_content">
        <h4>Gestiona tareas</h4>
        <p>
          Lleva un control exaustivo de las tareas de tu proyecto. De
          esta forma podreis organizaros el trabajo mejor y alcanzar
          vuestros objetivos.
        </p>
      </div>
    </div>
    <div class="g6-card">
      <i class="bi bi-flag"></i>
      <div class="g6-card_content">
        <h4>Reporta incidencias</h4>
        <p>
          Reporta incidencias y bugs a otros equipos para realizar un
          seguimiento de los fallos y solucionarlos lo antes posible.
        </p>
      </div>
    </div>
    <div class="g6-card">
      <i class="bi bi-star"></i>
      <div class="g6-card_content">
        <h4>Who's the boss</h4>
        <p>
          Gestiona tus propios proyectos y equipos convirtiendote en un
          Jefe de proyecto. Asigna roles a los diferentes miembros de tu
          grupo para conquistar las tareas que se os pongan por delante.
        </p>
      </div>
    </div>
  </div>
</div>
<div class="g6-section">
  <h1 class="g6-title">Sobre nosotros</h1>
  <div class="g6-section_content">
    <div>
      <div class="g6-author">
        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.cDhRJSU3YESH2cX-Drsu5gHaJQ%26pid%3DApi&f=1&ipt=ac410b38a643bcf0fa1102a1dbc0d9bf224fec25c0564a35ce66403dbb7c7ef4&ipo=images" alt="Adrian Herrero"/>
      </div>
      <p>Adrian Herrero</p>
    </div>
    <div>
      <div class="g6-author">
        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.explicit.bing.net%2Fth%3Fid%3DOIP.AXqqsIaiLb9c2K_nHlbqQgHaHa%26pid%3DApi&f=1&ipt=cd897c9d894fba0108170ab1eb3a9369c405306322e2686fc2a3f24c8dad2348&ipo=images" alt="Adrian Ruiz"/>
      </div>
      <p>Adrian Ruiz</p>
    </div>
    <div>
      <div class="g6-author">
        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.Y9ftmVQmHvnIJrxlGZ2owAHaJQ%26pid%3DApi&f=1&ipt=54dbc86232bde796c7e4ae7767e6aeb1cae8ef5ef994d64df69c59d9e462f2d8&ipo=images" alt="Ivan Peréz"/>
      </div>
      <p>Ivan Peréz</p>
    </div>
    <div>
      <div class="g6-author">
        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.qWiOQG0JBYjHEq2n0zwizAHaId%26pid%3DApi&f=1&ipt=5bd7808c65617f5de2050039e870c1317d91f8b54a7e605e74e6d8d9ed608956&ipo=images" alt="Noel Martinéz"/>
      </div>
      <p>Noel Martinéz</p>
    </div>
  </div>
</div>
@endsection
