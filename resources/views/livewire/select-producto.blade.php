<div class="col-4" id="divFormProducto">
    <div class="form-group">
        <label>Producto</label>
        <select wire:model="selectedProducto" class="form-control" id="productonnombre">
            <option value="" selected>Seleccione el producto</option>
            @foreach($productos as $p)
                <option value="{{$p->id}}">{{$p->nombre}}</option>
            @endforeach
        </select>
    </div>
    @if(!is_null($selectedProducto))
        <div class="form-group">
            <label for="tipoafectacion" class="form-label">Tipo de Afectacion</label>
            <input type="text" class="form-control" value="{{$producto->tipoafectacion->nombre_afectacion}}" id="productoafectacion" />
        </div>
        <div class="form-group">
            <label for="tipoafectacion" class="form-label">Tipo de Unidad</label>
            <input type="text" class="form-control" value="{{$producto->tipounidad->codigo}}" id="productounidad" />
        </div>
        <div class="form-group">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="any" class="form-control" value="{{$precio}}" id="productoprecio" />
        </div>
        <div class="form-group">
            <label for="valorunit" class="form-label">Cantidad</label>
            <input type="number" step="any" class="form-control" value="{{$cantidad}}" id="productocantidad" />
        </div>
        <div class="form-group">
            <label for="preciounit" class="form-label">Subtotal</label>
            <input type="number" step="any" class="form-control" value="{{$cantidad * $precio}}" readonly id="productosubtotal" />
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary btnAddProduct">Agregar Producto</button>
        </div>
    @endif
</div>


