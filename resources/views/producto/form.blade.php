@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $modo }} Producto</h1>

        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
            action="{{ $modo === 'Editar' ? route('producto.update', $producto->id) : route('producto.store') }}"
            enctype="multipart/form-data">
            @csrf
            @if ($modo === 'Editar')
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group border p-2">
                        <label for="producto">Nombre del producto</label>
                        <input type="text" class="form-control" name="producto" placeholder="Nombre"
                            value="{{ $modo === 'Editar' ? $producto->producto : old('producto') }}" id="producto">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group border p-2">
                        <label for="ubicacion">Ubicación del Producto</label>
                        <input type="text" class="form-control" name="ubicacion" placeholder="Ubicación del Producto"
                            value="{{ $modo === 'Editar' ? $producto->ubicacion : old('ubicacion') }}" id="ubicacion">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group border p-2">
                        <label for="cantidad">Cantidad del Producto</label>
                        <input type="number" class="form-control" name="cantidad" placeholder="Cantidad"
                            value="{{ $modo === 'Editar' ? $producto->cantidad : old('cantidad') }}" id="cantidad">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group border p-2">
                        <label for="precio">Precio del Producto</label>
                        <input type="number" class="form-control" name="precio" placeholder="Precio"
                            value="{{ $modo === 'Editar' ? $producto->precio : old('precio') }}" id="precio">
                    </div>
                </div>
                
                <br>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-success" type="submit">{{ $modo }} datos</button>
                    <a class="btn btn-primary ml-2" href="{{ url('producto/') }}">Regresar al inicio</a>
                </div>
            </div>
        </form>
    </div>
@endsection
