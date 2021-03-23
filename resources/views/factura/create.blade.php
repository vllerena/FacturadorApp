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
                                        @livewire('serie-correlativo')
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
{{--                                                        <button type="button" class="btn btn-default" onclick="ObtenerDatosEmpresa()"><li class="fa fa-search"></li></button>--}}
                                                        <button class="btn btn-primary waves-effect waves-light" type="button" id="btnRUC">
                                                            <div id="divbtnload">
                                                                <i class="mdi mdi-briefcase-search mr-1"></i> Buscar RUC
                                                            </div>
                                                        </button>

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
                                    </div>
                                </div>

                                <div class="row g-3" id="divCreateService">
                                    <div class="col-md-9">
                                        <label for="servicio" class="form-label">Servicio</label>
                                        <input type="text" class="form-control servicio" id="InputServicio">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tipoafectacion" class="form-label">Tipo de Afectación</label>
                                        <select class="form-select tipoafectacion" id="tipoafectacion">
                                            @foreach($tipoafectacion as $t)
                                                <option value="{{$t->id}}">{{$t->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tipoafectacion" class="form-label">Tipo de Afectación</label>
                                        <select class="form-select tipoafectacion" id="tipoafectacion">
                                            @foreach($tipoafectacion as $t)
                                                <option value="{{$t->id}}">{{$t->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="valorunit" class="form-label">Precio (Valor Unit)</label>
                                        <input type="number" step="any" class="form-control" id="valorunit" value="0">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="preciounit" class="form-label">Precio incl. IGV (Precio Unitario)</label>
                                        <input type="number" step="any" class="form-control" id="preciounit" value="0">
                                        <input type="hidden" step="any" class="form-control" id="gravado" value="0">
                                        <input type="hidden" step="any" class="form-control" id="exonerado" value="0">
                                        <input type="hidden" step="any" class="form-control" id="inafecto" value="0">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cantidad" class="form-label">Cantidad</label>
                                        <input type="number" class="form-control cantidad" id="cantidad" value="1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="precioventa" class="form-label">Importe (Precio Venta)</label>
                                        <input type="number" class="form-control" id="precioventa" readonly>
                                        <input type="hidden" step="any" class="form-control" id="valorventa" value="0">
                                        <input type="hidden" step="any" class="form-control" id="igv" value="0">
                                        <input type="hidden" step="any" class="form-control" id="tipoprecioventa" value="{{$tipopventa->id}}">
                                        <input type="hidden" step="any" class="form-control" id="tipounidad" value="{{$tipounidad->id}}">
                                        <input type="hidden" step="any" class="form-control" id="impuesto" value="{{number_format($impuesto->monto, 2)}}">
                                    </div>
                                    <div class="col-12">
                                        <button id="btnAddService" class="btn btn-primary">Agregar Servicio</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="tableService">
                                        <thead>
                                        <tr>
                                            <th scope="col">Ítem</th>
                                            <th scope="col">Servicio</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Importe</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mb-3" style="display:none" id="divGravado">
                                    <label for="gravadoventa" class="form-label">Total Gravado: </label>
                                    <input type="number" step="any" class="form-control" name="totalgravado" id="gravadoventa" readonly value=0>
                                </div>
                                <div class="mb-3" style="display:none" id="divInafecto">
                                    <label for="inafectoventa" class="form-label">Total Inafecto: </label>
                                    <input type="number" step="any" class="form-control" name="totalinafecto" id="inafectoventa" readonly value=0>
                                </div>
                                <div class="mb-3" style="display:none" id="divExonerado">
                                    <label for="exoneradoventa" class="form-label">Total Exonerado: </label>
                                    <input type="number" step="any" class="form-control" name="totalexonerado" id="exoneradoventa" readonly value=0>
                                </div>
                                <div class="mb-3">
                                    <label for="totaligvventa" class="form-label">Total IGV</label>
                                    <input type="number" step="any" class="form-control" name="totaligvventa" id="totaligvventa" readonly value=0>
                                    <input type="hidden" step="any" class="form-control" name="totalvalorventa" id="totalvalorventa" readonly value=0>
                                </div>
                                <div class="mb-3">
                                    <label for="totaldescuento" class="form-label">Total Descuento</label>
                                    <input type="number" step="any" class="form-control" name="totaldescuento" id="totaldescuento" value=0>
                                    <input type="hidden" step="any" class="form-control" name="totalprecioventa" id="totalprecioventa" readonly value=0>
                                </div>
                                <div class="mb-3">
                                    <label for="totalventa" class="form-label">Total Importe</label>
                                    <input type="number" step="any" class="form-control" name="totalimporte" id="totalventa" readonly value=0>
                                </div>
                                <div class="mb-3">
                                    <label for="numletras" class="form-label">Monto en Letras</label>
                                    <input type="text" class="form-control" name="numletras" id="numletras" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="checkCredito" class="form-label">¿Es venta al crédito?</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="checkCredito" name="credito">
                                        <label class="form-check-label" for="checkCredito">Sí</label>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3" style="display:none" id="divNumCuotas">

                                    <div class="col-md-6">
                                        <label for="numcuotas" class="form-label">Número de Cuotas</label>
                                        <input type="number" class="form-control mb-2" id="numcuotas">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="intervdias" class="form-label">Intervalo de dias</label>
                                        <input type="number" class="form-control mb-2" id="intervdias">
                                    </div>
                                    <div class="col-12">
                                        <button type="button" id="btnCalcularCuotas" class="btn btn-primary">Calcular</button>
                                    </div>
                                </div>
                                <div class="table-responsive" id="tableCredito" style="display:none">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Monto</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="mb-3">
                                    <label for="observaciones" class="form-label">Observaciones</label>
                                    <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                          name="observaciones" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Observaciones</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Confirmar</button>

                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Confirmar</button>
                            </div>
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

        function obtenerRUC() {
            $('#divbtnload').html(
                `<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Cargando...`).hide().fadeIn('slow');
            const inputRUC = document.querySelector('#nrodoc');
            const url = 'https://dni.optimizeperu.com/api/company/'+inputRUC.value+'?format=json';
            fetch(url).then(res => res.json())
                .catch(error => console.error('Error:', error))
                .then(response => mostrarRUC(response))
        }

        function mostrarRUC(datosRUC) {
            console.log(datosRUC);
            const inputRazonSocial = document.querySelector('#razon_social');
            if (datosRUC != null) {
                inputRazonSocial.value = datosRUC.razon_social;
                $('#divbtnload').html(`Buscar RUC`);
            } else {
                inputRazonSocial.value = "INGRESE UN NÚMERO DE RUC VÁLIDO";
                $('#divbtnload').html(`Buscar RUC`);
            }
        }


    </script>
@stop
