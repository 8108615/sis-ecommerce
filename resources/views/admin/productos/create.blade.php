@extends('layouts.admin')

@section('content')
    <h1>Creacion de un Nueva Producto</h1>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Llene los Campos del Formulario</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/productos/create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoria_id">Categoria (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                        <select name="categoria_id" id="categoria_id" class="form-control" required>
                                            <option value="">Seleccione una Categoria</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"
                                                    {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('categoria_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Producto (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-box"></i></span>
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                            value="{{ old('nombre') }}" placeholder="Nombre completo del Producto" required>
                                    </div>
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo">Codigo (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                        <input type="text" name="codigo" id="codigo" class="form-control"
                                            value="{{ old('codigo') }}" placeholder="Codigo unico del Producto" required>
                                    </div>
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion_corta">Descripcion Corta (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-text-left"></i></span>
                                                <input name="descripcion_corta" id="descripcion_corta" class="form-control"
                                                    placeholder="Descripcion breve del producto (max. 255 caracteres)"
                                                    maxlength="255" value="{{ old('descripcion_corta') }}" required>
                                            </div>
                                            @error('descripcion_corta')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <small class="text-muted"><span id="contador_corta">0</span>/255
                                                caracteres</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="precio_compra">Precio Compra (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                                <input type="number" name="precio_compra" id="precio_compra" 
                                                class="form-control" value="{{ old( 'precio_compra') }}"
                                                    placeholder="0.00" step="0.01" min="0" required>
                                            </div>
                                            @error('precio_compra')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="precio_venta">Precio Venta (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                                <input type="number" name="precio_venta" id="precio_venta" 
                                                class="form-control" value="{{ old( 'precio_venta') }}"
                                                    placeholder="0.00" step="0.01" min="0" required>
                                            </div>
                                            @error('precio_venta')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="stock">Stock (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-boxes"></i></span>
                                                <input type="number" name="stock" id="stock" 
                                                class="form-control" value="{{ old( 'stock') }}"
                                                    placeholder="0" min="0" required>
                                            </div>
                                            @error('stock')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion_larga">Descripcion Larga (*)</label>
                                            <div class="input-group">
                                                <div style="width: 100%">
                                                    <textarea name="descripcion_larga" id="descripcion_larga" class="form-control ckeditor" rows="1"
                                                    placeholder="Descripcion detallada del Producto">{{ old('descripcion_larga') }} </textarea>
                                                </div>       
                                            </div>
                                            @error('descripcion_larga')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                //Editor para el contenido (mas completo)
                                                ClassicEditor
                                                    .create(document.querySelector('#descripcion_larga'), {
                                                        toolbar: {
                                                            items: [
                                                                'heading', '|',
                                                                'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                                                                'link', 'bulletedList', 'numberedList', '|',
                                                                'outdent', 'indent', '|',
                                                                'alignment', '|',
                                                                'blockQuote', 'insertTable', 'mediaEmbed', '|',
                                                                'undo', 'redo', '|',
                                                                'fontBackgroundColor', 'fontColor', 'fontSize', 'fontFamily', '|',
                                                                'code', 'codeBlock', 'htmlEmbed', '|',
                                                                'sourceEditing'
                                                            ],
                                                            shouldNotGroupWhenFull: true
                                                        },
                                                        language: 'es',
                                                    })
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/productos') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary"> Registrar </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
