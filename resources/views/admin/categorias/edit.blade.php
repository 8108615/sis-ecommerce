@extends('layouts.admin')

@section('content')
    <h1>Modificar Categoria: {{ $categoria->nombre }}</h1>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Llene los Campos del Formulario</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/categoria/'.$categoria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                        <input type="text" name="nombre" id="nombre" class="form-control" 
                                        value="{{ old('nombre',$categoria->nombre) }}" placeholder="Nombre de la Categoria" required>
                                    </div>
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slug">Slug (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                                        <input type="text" name="slug" id="slug" class="form-control" 
                                        value="{{ old('slug',$categoria->slug) }}" placeholder="Slug-de-la-Categoria" readonly required>
                                    </div>
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <small class="text-muted">URL amigable (Ej: Electronica, Ropa-deportiva)</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-text-paragraph"></i></span>
                                        <textarea name="descripcion" id="descripcion" class="form-control" 
                                        rows="4" placeholder="Descripcion de la Categoria (Opcional)"> {{ old('descripcion',$categoria->descripcion) }}</textarea>
                                    </div>
                                    @error('descripcion')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/categorias') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success"> Actualizar </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        //Generar slug automaticamente  desde el nombre
        document.getElementById('nombre').addEventListener('input', function() {
            let nombre = this.value;
            let slug = nombre.toLowerCase()
                .replace(/[áàäâ]/g, 'a')
                .replace(/[éèëê]/g, 'e')
                .replace(/[íìïî]/g, 'i')
                .replace(/[óòöô]/g, 'o')
                .replace(/[úùüû]/g, 'u')
                .replace(/ñ/g, 'n')
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-|-$/g, '');
            document.getElementById('slug').value = slug;
        });
    </script>
@endsection
