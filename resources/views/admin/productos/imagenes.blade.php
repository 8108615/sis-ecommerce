@extends('layouts.admin')

@section('content')
    <h1>
        Datos del Producto: {{ $producto->nombre }}
        <div style="float:right">
            <a href="{{ url('/admin/productos') }}" class="btn btn-secondary">Volver</a>
        </div>
    </h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Llene los Campos del Formulario</h4>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="categoria_id">Categoria</label>
                                <p><i class="bi bi-tag"></i> {{ $producto->categoria->nombre }}</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre del Producto</label>
                                <p><i class="bi bi-box"></i> {{ $producto->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <p><i class="bi bi-upc-scan"></i> {{ $producto->codigo }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion_corta">Descripcion Corta</label>
                                        <p><i class="bi bi-text-left"></i> {{ $producto->descripcion_corta }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio_compra">Precio Compra</label>
                                        <p><i class="bi bi-currency-dollar"></i> {{ $producto->precio_compra }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio Venta</label>
                                        <p><i class="bi bi-currency-dollar"></i> {{ $producto->precio_venta }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <p><i class="bi bi-boxes"></i> {{ $producto->stock }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion_larga">Descripcion Larga</label>
                                        <p>{!! $producto->descripcion_larga !!}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Imagenes del Producto
                        <div style="float: right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-plus"></i> Cargar Imagen
                            </button>
                        </div>
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cargar Imagen del Producto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('admin/producto/' . $producto->id . '/upload_imagen') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <br>
                                                    <label for="imagen" class="form-label">Imagen del Producto (*)</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-camera"></i></span>
                                                        <input type="file" name="imagen" id="imagen"
                                                            onchange="mostrarImagen(event)" class="form-control"
                                                            accept="image/*" required>
                                                        @error('imagen')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <center>
                                                    <img src="" id="preview2"
                                                        style="max-width: 300px; margin-top: 10px;" alt="">
                                                </center>
                                                <script>
                                                    const mostrarImagen = e =>
                                                        document.getElementById('preview2').src = URL.createObjectURL(e.target.files[0]);
                                                </script>
                                                <br>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar Imagen</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($producto->imagenes as $imagen)
                            <div class="col-md-3" style="margin-bottom: 20px;">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $imagen->imagen) }}" class="card-img-top"
                                        alt="Imagen del Producto">
                                    <br>
                                    <form action="{{ url('/admin/producto/imagen/'.$imagen->id .'/destroy_imagen') }}"
                                        method="POST" id="miFormulario{{ $imagen->id }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-block"
                                            onclick="preguntar{{ $imagen->id }}(event)">
                                            <i class="bi bi-trash"></i> Borrar Imagen
                                        </button>
                                    </form>
                                    <script>
                                        function preguntar{{ $imagen->id }}(event) {
                                            event.preventDefault();
                                            Swal.fire({
                                                title: '¿Deseas Eliminar esta Imagen?',
                                                text: '',
                                                icon: 'question',
                                                showDenyButton: true,
                                                confirmButtonText: 'Eliminar',
                                                confirmButtonColor: '#a5161d',
                                                denyButtonColor: '#270a0a',
                                                denyButtonText: 'Cancelar',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById('miFormulario{{ $imagen->id }}').submit();
                                                }
                                            });
                                        }
                                    </script>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
