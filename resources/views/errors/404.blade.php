@extends('layouts.web')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">404</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">404</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Error 404 Section -->
    <section id="error-404" class="error-404 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="text-center">
          <div class="error-icon mb-4" data-aos="zoom-in" data-aos-delay="200">
            <i class="bi bi-exclamation-circle"></i>
          </div>

          <h1 class="error-code mb-4" data-aos="fade-up" data-aos-delay="300">404</h1>

          <h2 class="error-title mb-3" data-aos="fade-up" data-aos-delay="400">¡Oops! Página No Encontrada</h2>

          <p class="error-text mb-4" data-aos="fade-up" data-aos-delay="500">
            La página que está buscando podría haber sido eliminada, haber cambiado su nombre o no estar disponible temporalmente.
          </p>

          

          <div class="error-action" data-aos="fade-up" data-aos-delay="700">
            <a href="{{ url('/') }}" class="btn btn-primary">Volver a la Página de Inicio</a>
          </div>
        </div>

      </div>

    </section><!-- /Error 404 Section -->
@endsection