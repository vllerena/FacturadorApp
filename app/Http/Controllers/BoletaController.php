<?php

namespace App\Http\Controllers;

use App\Models\Emisor;
use App\Models\TipoComprobante;
use App\Models\TipoDocumento;
use App\Models\TipoMoneda;
use App\Utils\ApiFacturacion;
use App\Utils\CantidadEnLetras;
use App\Utils\GeneradorXML;
use Illuminate\Http\Request;

class BoletaController extends Controller
{
    public function create()
    {
        $emisor = Emisor::all();
        $tipomoneda = TipoMoneda::all();
        $tipocomprobante = TipoComprobante::all();
        $tipodocumento = TipoDocumento::all();
        return view('boleta.create', compact('emisor', 'tipomoneda', 'tipocomprobante', 'tipodocumento'));
    }

    public function store(Request $request){
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
            'tipodoc'       => '1', //6: RUC, 1: DNI
            'ruc'           => '12345678',
            'razon_social'  => 'CLIENTE VARIAS',
            'direccion'     => 'Cal. Francisco Cuneo-Pataz Nro. 270(Frente al Circulo Departamental de Emple)',
            'pais'          => 'PE', //codigo de pais
        );

        $comprobante = array(
            'tipodoc'       => '03', //FACTURA: 01, BOLETA:03, NOTA CREDITO:07, ND: 08
            'serie'         => 'B001', //F:FACTURA, B:BOLETA
            'correlativo'   => '1',
            'fecha_emision' => '2021-02-24',
            'moneda'        => 'PEN', //PEN: SOLES, USD: DOLARES
            'total_opgravadas'      => 0, //
            'total_opexoneradas'    => 0, //
            'total_opinafectas'     => 0, //
            'igv'                   => 0,
            'total'                 => 0,
            'total_texto'           => 0,
        );

        $detalle = array(
            array(
                'item'              => 1,
                'codigo'            => '01', //codigo del producto del sistema
                'descripcion'       => 'ACEITE',
                'cantidad'          => 1,
                'valor_unitario'    => 50,
                'precio_unitario'   => 59,
                'tipo_precio'       => '01', //Este precio incluye IGV Catálogo No. 16: Códigos – Tipo de precio de venta unitario
                'igv'               => 9,
                'porcentaje_igv'    => 18, //0 a 100
                'valor_total'       => 50,
                'importe_total'     => 59,
                'unidad'            => 'NIU', //Unidad de medida
                'codigo_afectacion_alt' => '10', //Catálogo No. 07: Códigos de tipo de afectación del IGV
                'codigo_afectacion' => 1000, //Catálogo No. 05: Códigos de tipos de tributos
                'nombre_afectacion' =>  'IGV', //Catálogo No. 05: Códigos de tipos de tributos
                'tipo_afectacion'   =>  'VAT' //GRAVADAS Catálogo No. 05: Códigos de tipos de tributos
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
                'descripcion'		=> 'TOMATE',
                'cantidad'			=> 1,
                'valor_unitario'	=> 50,
                'precio_unitario'	=> 50,
                'tipo_precio'		=> "01", //ya incluye igv
                'igv'				=> 0,
                'porcentaje_igv'	=> 18,
                'valor_total'		=> 50,
                'importe_total'		=> 50,
                'unidad'			=> 'NIU',//unidad,
                'codigo_afectacion_alt'	=> '30', // Catálogo No. 07 - Anexo V Catálogo No. 07: Códigos de tipo de afectación del IGV
                'codigo_afectacion'	=> 9998, //Catálogo No. 05: Códigos de tipos de tributos
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
        $xml->CrearXMLFactura($ruta, $emisor, $cliente, $comprobante, $detalle);

        $api = new ApiFacturacion();
        $api->EnviarComprobanteElectronico($emisor, $nombrexml);

        return ('BOLETA: XML FIRMADO Y ZIPEADO CON EXITO');
    }
}
