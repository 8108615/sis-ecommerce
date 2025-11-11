@extends('layouts.web')

@section('content')
    <!-- best-sellers Section -->
    <section id="best-sellers" class="best-sellers section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Resultado de la Busqueda para: {{ $query ?? '' }}</h2>
            <p>Encuentra lo que Buscas</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-5">

                @if ($productos->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            No se encontraron productos que coincidan con tu búsqueda.
                        </div>
                    </div>
                @else
                    @foreach ($productos as $producto)
                        <!-- Producto -->
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item">
                                <div class="product-image">
                                    @php
                                        $imagen_producto = $producto->imagenes->first();
                                        $imagen = $imagen_producto->imagen ?? '';
                                    @endphp
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="Product Image" class="img-fluid"
                                        loading="lazy">
                                    <div class="product-actions">
                                        <button class="action-btn wishlist-btn">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                        <a href="{{ url('/producto/' . $producto->id) }}" class="action-btn quickview-btn">
                                            <i class="bi bi-zoom-in"></i>
                                        </a>
                                    </div>
                                    <button class="cart-btn">Agregar al Carrito</button>
                                </div>
                                <div class="product-info">
                                    <div class="product-category">{{ $producto->nombre }}</div>
                                    <h4 class="product-name"><a href="{{ url('/producto/' . $producto->id) }}">
                                            {{ $producto->descripcion_corta }}</a></h4>
                                    <div class="product-rating">
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </div>
                                        <span class="rating-count">(38)</span>
                                        <span class="badge bg-danger">{{ $producto->stock }} Disponibles</span>
                                    </div>
                                    <div class="product-price">
                                        {{--   <span class="old-price">$240.00</span> --}}
                                        <span
                                            class="current-price">{{ $ajuste->divisa . ' ' . $producto->precio_venta }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Producto -->
                    @endforeach

                    @if ($productos->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                            <div class="text-muted">
                                Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de
                                {{ $productos->total() }} productos
                            </div>
                            <div>
                                {{ $productos->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif
                @endif




            </div>

        </div>

    </section><!-- /Best Sellers Section -->
@endsection
