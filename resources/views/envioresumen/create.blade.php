@extends('adminlte::page')

@section('title', 'Envío de Resumen de Documentos')

@section('content_header')
    <h1>Envío de Resumen de Documentos</h1>
@stop

@section('content')
    <form action="{{route('envioresumen.store')}}" method="POST">
        @csrf
        <div class="col-md-12">
            <div class="form-group">
                <label>Envío de resúmenes</label>
                </br>
                <label>Facturar Por</label>
                <select class="form-control" id="idemisor" name="idemisor">
                    @foreach($emisor as $e)
                        <option value="{{$e->id}}">{{$e->razon_social}}</option>
                    @endforeach
                    <input type="hidden" name="accion" id="accion" value="GUARDAR_VENTA">
                </select>
            </div>
        </div>
        <input type="hidden" name="accion" value="ENVIO_RESUMEN" />
        <input type="hidden" name="ids" id="ids" value="0" />
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>*</th>
                <th>ID</th>
                <th>Fecha</th>
                <th>Serie</th>
                <th>Correlativo</th>
            </tr>
            </thead>
            <tbody>
                @foreach($boletas as $b)
                    <tr>
                        <td><input type="checkbox" name="documento[]" value="{{$b->id}}" />
                        </td>
                        <td>{{$b->id}}</td>
                        <td>{{$b->fecha_emision}}</td>
                        <td>{{$b->serie}}</td>
                        <td>{{$b->correlativo}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary" type="submit" >Enviar</button>
    </form>
    <div align="right" class="col-md-12">
        <button class="btn btn-primary" type="button" onclick="EnviarResumenComprobantes()">Enviar Comprobantes</button>
    </div>
    <div id="divResultado">

    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
