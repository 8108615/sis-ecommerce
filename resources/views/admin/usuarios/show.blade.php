@extends('layouts.admin')

@section('content')
    <h1>Datos del Usuario {{ $usuario->name }}</h1>

    <hr>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Datos Registrados</h4>
                </div>
                <div class="card-body">
                   
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                   <p><i class="bi bi-shield-check"></i>
                                    {{ $usuario->roles->pluck('name')->implode(', ') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <p></p><i class="bi bi-person-badge-fill"></i>
                                    {{ $usuario->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                   <p></p> <i class="bi bi-envelope-fill"></i>
                                    {{ $usuario->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Fecha y Hora de Registro</label>
                                    <p><i class="bi bi-clock"></i> {{ $usuario->created_at }}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/usuarios') }}" class="btn btn-secondary">Volver</a>
                                    
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
