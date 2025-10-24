@extends('layouts.admin')

@section('content')
    <h1> Ajustes del Sistema</h1>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Configuraciones del Sistema</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/ajustes/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre" class="form-label">Nombre (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                                <input type="text" name="nombre" id="nombre"
                                                    class="form-control @error('nombre') is-invalid @enderror"
                                                    placeholder="Nombre de la Empresa..." value="{{ old('nombre',$ajuste->nombre ?? '') }}"
                                                    required>
                                                @error('nombre')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="descripcion" class="form-label">Descripcion (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                                <input type="text" name="descripcion" id="descripcion"
                                                    class="form-control @error('descripcion') is-invalid @enderror"
                                                    placeholder="Descripcion de la Empresa..."
                                                    value="{{ old('descripcion',$ajuste->descripcion ?? '') }}" required>
                                                @error('descripcion')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sucursal" class="form-label">Sucursal (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-shop"></i></span>
                                                <input type="text" name="sucursal" id="sucursal"
                                                    class="form-control @error('sucursal') is-invalid @enderror"
                                                    placeholder="Sucursal de la Empresa..." value="{{ old('sucursal',$ajuste->sucursal ?? '') }}"
                                                    required>
                                                @error('sucursal')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="direccion" class="form-label">Direccion (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text align-items-start pt-2"><i class="bi bi-geo-alt"></i></span>
                                                <textarea name="direccion" id="direccion" rows="1" class="form-control @error('direccion') is-invalid @enderror" 
                                                placeholder="Calle, Numero, Ciudad, Pais" required>{{ old('direccion',$ajuste->direccion ?? '') }}</textarea>
                                                @error('direccion')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefonos" class="form-label">Telefonos (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                                <input type="text" name="telefonos" id="telefonos"
                                                    class="form-control @error('telefonos') is-invalid @enderror"
                                                    placeholder="Ej: +591 123456, 789012" value="{{ old('telefonos',$ajuste->telefonos ?? '') }}"
                                                    required>
                                                @error('telefonos')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                                <input type="email" name="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Ej: info@tuempresa.com" value="{{ old('email',$ajuste->email ?? '') }}"
                                                    required>
                                                @error('email')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="divisa" class="form-label">Divisa (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                                <select name="divisa" id="" class="form-control">
                                                    <option value="">--Seleccione una Divisa--</option>
                                                    @foreach ($divisas as $divisa)
                                                        <option value="{{ $divisa['symbol'] }}"
                                                        {{ (old('divisa',$ajuste->divisa ?? '') == $divisa['symbol']) ? 'selected' : '' }}>
                                                            {{ $divisa['name'] }}({{ $divisa['symbol'] }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('divisa')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pagina_web" class="form-label">Pagina Web (Opcional)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-globe"></i></span>
                                                <input type="text" name="pagina_web" id="pagina_web"
                                                    class="form-control @error('pagina_web') is-invalid @enderror"
                                                    placeholder="Ej: https://miempresa.com" value="{{ old('pagina_web',$ajuste->pagina_web ?? '') }}">
                                                @error('pagina_web')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="logo" class="form-label">Logo @if (!isset($ajuste) || !$ajuste->logo) (*) @else  @endif</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-image"></i></span>
                                                <input type="file" name="logo" id="logo" onchange="mostrarImagen(event)"
                                                class="form-control @error('logo') is-invalid @enderror" 
                                                accept="image/*" @if (!isset($ajuste) || !$ajuste->logo) required @else  @endif>
                                                @error('logo')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <center>
                                            @if (@isset($ajuste) && $ajuste->logo)
                                                <img src="{{ asset('storage/' . $ajuste->logo) }}" id="preview1" style="max-width: 200px; margin-top:10px " 
                                                alt="Logo Actual">
                                            @else
                                                <img src="" id="preview1" style="max-width: 300px; margin-top: 10px;" alt="">
                                            @endif
                                        </center>
                                        
                                        <script>
                                            const mostrarImagen = e =>
                                               document.getElementById('preview1').src = URL.createObjectURL(e.target.files[0]);
                                        </script>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label for="imagen_login" class="form-label">Imagen de Login @if (!isset($ajuste) || !$ajuste->imagen_login) (*) @else  @endif</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-camera"></i></span>
                                                <input type="file" name="imagen_login" id="imagen_login" onchange="mostrarImagen2(event)" 
                                                class="form-control @error('imagen_login') is-invalid @enderror" 
                                                accept="image/*" @if (!isset($ajuste) || !$ajuste->imagen_login) required @else  @endif>
                                                @error('imagen_login')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <center>
                                            @if (@isset($ajuste) && $ajuste->imagen_login)
                                                <img src="{{ asset('storage/' . $ajuste->imagen_login) }}" id="preview2" style="max-width: 200px; margin-top:10px " 
                                                alt="Imagen de Login Actual">
                                            @else
                                                <img src="" id="preview2" style="max-width: 300px; margin-top: 10px;" alt="">
                                            @endif
                                        </center>
                                        <script>
                                            const mostrarImagen2 = e =>
                                               document.getElementById('preview2').src = URL.createObjectURL(e.target.files[0]);
                                        </script>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar Cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
