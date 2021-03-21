@extends('adminlte::page')

@section('title', 'Crear Factura')

@section('content_header')
    <h1>Crear Factura</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="fas fa-shopping-cart"></i> Registrar Venta: Factura</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('factura.store')}}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Facturar Por</label>
                                                <select class="form-control" id="idemisor" name="idemisor">
                                                    @foreach($emisor as $e)
                                                        <option value="{{$e->id}}">{{$e->razon_social}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="accion" id="accion" value="GUARDAR_VENTA">
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha</label>
                                                <input class="form-control" type="date" name="fecha_emision" id="fecha_emision" value="<?php echo date('Y-m-d');?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>Moneda</label>
                                                <select class="form-control" type="date" name="moneda" id="moneda">
                                                    @foreach($tipomoneda as $t)
                                                        <option value="{{$t->id}}">{{$t->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Tipo Comp.</label>
                                                <select class="form-control" name="tipocomp" id="tipocomp" onchange="ConsultarSerie()">
                                                    @foreach($tipocomprobante as $t)
                                                        <option value="{{$t->id}}">{{$t->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Serie</label>
                                                <select class="form-control" type="date" name="idserie" id="idserie" onchange="ConsultarCorrelativo()">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Correlativo</label>
                                                <input class="form-control" type="number" name="correlativo" id="correlativo" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Tipo Doc.</label>
                                                <select class="form-control" name="tipodoc" id="tipodoc">
                                                    @foreach($tipodocumento as $t)
                                                        <option value="{{$t->id}}">{{$t->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nro. Doc</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" name="nrodoc" id="nrodoc" />
                                                    <div class="input-group-addon">
                                                        <button type="button" class="btn btn-default" onclick="ObtenerDatosEmpresa()"><li class="fa fa-search"></li></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre/Raz. Social</label>
                                                <input class="form-control" type="text" name="razon_social" id="razon_social" />
                                            </div>
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <input class="form-control" type="text" name="direccion" id="direccion" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="producto" id="producto" placeholder="producto..." />
                                                <div class="input-group-addon">
                                                    <button type="button" class="btn btn-default" onclick="BuscarProducto()"><li class="fa fa-search"></li></button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <table class="table table-bordered table-hover table-sm">
                                                    <thead>
                                                    <th>Cod</th>
                                                    <th>Nombre</th>
                                                    <th>Prec.</th>
                                                    <th width="100">Cant.</th>
                                                    <th>
                                                        <button type="button" class="btn btn-info">  +</button> </th>
                                                    </thead>
                                                    <tbody id="div_productos">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="col-12" id="div_carrito">
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary" onclick="GuardarVenta()"><i class="fa fa-save"></i> Guardar</button>
                                                <button type="button" class="btn btn-danger" onclick="CancelarVenta();"> <i class="far fa-trash-alt"></i> Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('css')

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
