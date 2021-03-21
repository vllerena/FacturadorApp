<?php

namespace App\Http\Controllers;

use App\Models\Emisor;
use App\Models\TablaParametrica;
use App\Models\TipoComprobante;
use App\Models\TipoDocumento;
use App\Models\TipoMoneda;
use App\TableInfo\TablaParametricaTableInfo;
use App\Utils\ApiFacturacion;
use App\Utils\CantidadEnLetras;
use App\Utils\GeneradorXML;
use Illuminate\Http\Request;

class NotaCreditoController extends Controller
{
    public function create()
    {
        $emisor = Emisor::all();
        $tipomoneda = TipoMoneda::all();
        $tipocomprobante = TipoComprobante::all();
        $tipodocumento = TipoDocumento::all();
        $motivo = TablaParametrica::where(TablaParametricaTableInfo::TIPO, 'C')->get();
        return view('notacredito.create', compact('emisor', 'tipomoneda', 'tipocomprobante', 'tipodocumento', 'motivo'));
    }

    public function store(Request $request)
    {
        $emisor = array(
            'tipodoc'       => '6',
            'ruc'           => '20345678901',
            'razon_social'  => 'EMPRESA SAC',
            'nombre_comercial'  => 'EMPRESA SAC',
            'direccion'     => 'AV. LA LIBERTAD 145 CHICLAYO-CHICLAYO-LAMBAYEQUE',
            'pais'          => 'PE', //codigo de pais
            'departamento'  => 'LAMBAYEQUE',
            'provincia'     => 'CHICLAYO',
            'distrito'      => 'CHICLAYO',
            'ubigeo'        => '140101',
            'usuario_sol'   => 'MODDATOS', //Es el usuario secundario de emision electronica
            'clave_sol'     => 'MODDATOS', //clave del usuario secundario de emisión
        );

        $cliente = array(
            'tipodoc'       => '6', //6: RUC, 1: DNI
            'ruc'           => '20480631286',
            'razon_social'  => 'CETI',
            'direccion'     => 'Cal. Francisco Cuneo-Pataz Nro. 270(Frente al Circulo Departamental de Emple)',
            'pais'          => 'PE', //codigo de pais
        );

        $comprobante = array (
            'tipodoc'       => '07', //FACTURA: 01, BOLETA:03, NOTA CREDITO:07, ND: 08
            'serie'         => 'FC01', //F: proviene de una factura, B: de una boleta
            'correlativo'   => '102',
            'fecha_emision' => '2021-02-24',
            'moneda'        => 'PEN', //PEN: SOLES, USD: DOLARES
            'total_opgravadas'      => 0, //
            'total_opexoneradas'    => 0, //
            'total_opinafectas'     => 0, //
            'igv'                   => 0,
            'total'                 => 0,
            'total_texto'           => 0,
            'tipodoc_ref'           => '01', //FACTURA
            'serie_ref'             => 'F021',
            'correlativo_ref'       => '123',
            'codmotivo'             => '01', //Catálogo No. 09: Códigos de tipo de nota de crédito electrónica
            'descripcion'           =>  'ANULACION DE LA OPERACION'
        );

        $detalle = array(
                array(
                    'item' 				=> 1,
                    'codigo'			=> '11',
                    'descripcion'		=> 'ACEITE CAPRI',
                    'cantidad'			=> 1,
                    'valor_unitario'	=> 50,
                    'precio_unitario'	=> 59,
                    'tipo_precio'		=> "01", //ya incluye igv
                    'igv'				=> 9,
                    'porcentaje_igv'	=> 18, //de 0 a 100
                    'valor_total'		=> 50,
                    'importe_total'		=> 59,
                    'unidad'			=> 'NIU',//unidad,
                    'codigo_afectacion_alt'	=> '10', // Catálogo No. 07 - Anexo V
                    'codigo_afectacion'	=> 1000,
                    'nombre_afectacion'	=>'IGV',
                    'tipo_afectacion'	=> 'VAT' //GRAVADAS
                ),
                array(
                    'item' 				=> 2,
                    'codigo'			=> '22',
                    'descripcion'		=> 'LIBRO ABC',
                    'cantidad'			=> 1,
                    'valor_unitario'	=> 50,
                    'precio_unitario'	=> 50,
                    'tipo_precio'		=> "01", //ya incluye igv
                    'igv'				=> 0,
                    'porcentaje_igv'	=> 18,
                    'valor_total'		=> 50,
                    'importe_total'		=> 50,
                    'unidad'			=> 'NIU',//unidad,
                    'codigo_afectacion_alt'	=> '20', // Catálogo No. 07 - Anexo V
                    'codigo_afectacion'	=> 9997,
                    'nombre_afectacion'	=>	'EXO',  //EXONERADOS
                    'tipo_afectacion'	=> 'VAT'
                ),
                array(
                    'item' 				=> 3,
                    'codigo'			=> '33',
                    'descripcion'		=> 'TOMATE ABC',
                    'cantidad'			=> 1,
                    'valor_unitario'	=> 50,
                    'precio_unitario'	=> 50,
                    'tipo_precio'		=> "01", //ya incluye igv
                    'igv'				=> 0,
                    'porcentaje_igv'	=> 18,
                    'valor_total'		=> 50,
                    'importe_total'		=> 50,
                    'unidad'			=> 'NIU',//unidad,
                    'codigo_afectacion_alt'	=> '30', // Catálogo No. 07 - Anexo V
                    'codigo_afectacion'	=> 9998,
                    'nombre_afectacion'	=>	'INA',  // INAFECTAS
                    'tipo_afectacion'	=> 'FRE'
                )
            );

        $op_gravadas = 0;
        $op_inafectas = 0;
        $op_exoneradas = 0;
        $igv = 0;
        $total = 0;

        foreach ($detalle as $k => $v) {
            if($v['codigo_afectacion_alt']=='10'){
                $op_gravadas = $op_gravadas + $v['valor_total'];
            }

            if($v['codigo_afectacion_alt']=='20'){
                $op_exoneradas = $op_exoneradas + $v['valor_total'];
            }

            if($v['codigo_afectacion_alt']=='30'){
                $op_inafectas = $op_inafectas + $v['valor_total'];
            }

            $igv = $igv + $v['igv'];
            $total = $total + $v['importe_total'];
        }

        $comprobante['total_opgravadas'] = $op_gravadas;
        $comprobante['total_opexoneradas'] = $op_exoneradas;
        $comprobante['total_opinafectas'] = $op_inafectas;
        $comprobante['igv'] = $igv;
        $comprobante['total'] = $total;
        $cantidadletras = new CantidadEnLetras();
        $comprobante['total_texto'] = $cantidadletras->ValorEnLetras($total, 'SOLES');

        $xml = new GeneradorXML();
        $nombrexml= $emisor['ruc'] . '-' . $comprobante['tipodoc'] . '-' . $comprobante['serie'] . '-' . $comprobante['correlativo'];
        $ruta = 'xml/' . $nombrexml;
        $xml->CrearXMLNotaCredito($ruta, $emisor, $cliente, $comprobante, $detalle);

        $api = new ApiFacturacion();
        $api->EnviarComprobanteElectronico($emisor, $nombrexml);

        return ('NOTA DE CREDITO: XML FIRMADO Y ZIPEADO CON EXITO');
    }
}
