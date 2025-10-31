@extends('layouts.admin')

@section('content')
    <h1>Listado de Productos</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Productos Registradas
                        <a href="{{ url('/admin/productos/create') }}" style="float: right" class="btn btn-primary"><i class="bi bi-plus"></i> Crear Nuevo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('/admin/productos') }}" method="GET" class="mt-3">
                                <div class="input-group">
                                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..." value="{{ $_REQUEST['buscar'] ?? '' }}">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ url('/admin/productos') }}" class="btn btn-success">
                                        <i class="bi bi-trash"></i> Limpiar</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Categoria</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Descripcion Corta</th>
                                <th>Precio de Compra</th>
                                <th>Precio de Venta</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($productos->currentPage() - 1) * $productos->perPage() + 1;
                            @endphp
                            @foreach($productos as $producto)
                                <tr>
                                    <td style="text-align: center">{{ $nro++ }}</td>
                                    <td>{{ $producto->categoria->nombre }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->codigo }}</td>
                                    <td>{{ $producto->descripcion_corta }}</td>
                                    <td>{{ $producto->precio_compra }}</td>
                                    <td>{{ $producto->precio_venta }}</td>
                                    <td>{{ $producto->stock }}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ url('/admin/producto/' . $producto->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Ver</a>
                                            <a href="{{ url('/admin/producto/' . $producto->id.'/imagenes') }}" class="btn btn-warning btn-sm"><i class="bi bi-card-image"></i> Imágenes</a>
                                            <a href="{{  url('/admin/producto/'.$producto->id.'/edit') }}" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="preguntar{{ $producto->id }}(event)">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </div>
                                        <form action="{{ url('/admin/producto/'.$producto->id) }}" method="POST" 
                                            id="miFormulario{{ $producto->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <script>
                                            function preguntar{{ $producto->id }}(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Deseas Eliminar Este Registro?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if(result.isConfirmed) {
                                                        document.getElementById('miFormulario{{ $producto->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($productos->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                            <div class="text-muted">
                                Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de {{ $productos->total() }} productos
                            </div>
                            
                            <div>
                                {{ $productos->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>

    

@endsection


