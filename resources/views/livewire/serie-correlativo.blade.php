<div class="col-4">
    <div class="form-group">
        <label>Tipo Comp.</label>
        <select wire:model="selectedTipoComprobante" class="form-control" name="tipocomprobante">
            <option value="" selected>Seleccione el tipo de comprobante</option>
            @foreach($tipocomprobante as $t)
                <option value="{{$t->id}}">{{$t->descripcion}}</option>
            @endforeach
        </select>
    </div>
    @if(!is_null($selectedTipoComprobante))
    <div class="form-group">
        <label>Serie</label>
        <select wire:model="selectedSerie" class="form-control" name="serie">
            <option value="" selected>Seleccione la serie</option>
            @foreach($serie as $s)
                <option value="{{$s->id}}">{{$s->serie}}</option>
            @endforeach
        </select>
    </div>
    @endif
    @if(!is_null($selectedSerie))
        <div class="form-group">
            <label>Correlativo</label>
            <input class="form-control" type="text" value="{{$correlativo->correlativo}}" name="correlativo" />
        </div>
    @endif

</div>
