<?php

namespace App\Http\Controllers;

use App\Models\Emisor;
use App\Models\TablaParametrica;
use App\Models\TipoComprobante;
use App\Models\TipoDocumento;
use App\Models\TipoMoneda;
use App\Models\Venta;
use App\TableInfo\TablaParametricaTableInfo;
use App\TableInfo\VentaTableInfo;
use App\Utils\ApiFacturacion;
use App\Utils\GeneradorXML;
use Illuminate\Http\Request;

class ResumenDocumentoController extends Controller
{

    public function resumencreate()
    {
        $emisor = Emisor::all();
        $boletas = Venta::where(VentaTableInfo::TIPO_COMPROBANTE, 1)->get();
        return view('envioresumen.create', compact('emisor', 'boletas'));
    }

    public function resumenstore()
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

        $cabecera = array(
            "tipodoc"		=> "RC",
            "serie"			=> date('Ymd'),
            "correlativo"	=> "1",
            "fecha_emision" => date('Y-m-d'),
            "fecha_envio"	=> date('Y-m-d')
        );

        $items = array();

        $cant=2;

        for($i=1;$i<=$cant;$i++){
            $item_total = rand(10,100);
            $item_valor = $item_total/1.18;
            $item_valor = (float) number_format($item_valor,2,'.','');

            $item_igv = $item_total - $item_valor;

            $items[] = array(
                "item"				=> $i,
                "tipodoc"			=> "03",
                "serie"				=> "B00".rand(1,9),
                "correlativo"		=> rand(1,50000),
                "condicion"			=> rand(1,3), //1->Registro, 2->Actuali, 3->Bajas
                "moneda"			=> "PEN",
                "importe_total"		=> $item_total,
                "valor_total"		=> $item_valor,
                "igv_total"			=> $item_igv,
                "tipo_total"		=> "01", //GRA->01, EXO->02, INA->03
                "codigo_afectacion"	=>"1000",
                "nombre_afectacion"	=>"IGV",
                "tipo_afectacion"	=>"VAT"
            );
        }

        $j = count($items)+1;
        $cant = $j+2;
        for($i=$j;$i<=$cant-1;$i++){
            $item_total = rand(10,100);

            $items[] = array(
                "item"				=> $i,
                "tipodoc"			=> "03",
                "serie"				=> "B00".rand(1,9),
                "correlativo"		=> rand(1,50000),
                "condicion"			=> rand(1,3), //1->Registro, 2->Actuali, 3->Bajas
                "moneda"			=> "PEN",
                "importe_total"		=> $item_total,
                "valor_total"		=> $item_total,
                "igv_total"			=> 0,
                "tipo_total"		=> "02",//GRA->01, EXO->02, INA->03
                "codigo_afectacion"	=>"9997",
                "nombre_afectacion"	=>"EXO",
                "tipo_afectacion"	=>"VAT"
            );
        }

        $xml = new GeneradorXML();
        $nombrexml = $emisor['ruc'].'-'.$cabecera['tipodoc'].'-'.$cabecera['serie'].'-'.$cabecera['correlativo'];
        $rutaxml = "xml/";
        $xml->CrearXMLResumenDocumentos($emisor, $cabecera, $items, $rutaxml.$nombrexml);

        $api = new ApiFacturacion();
        $api->EnviarResumenComprobantes($emisor, $nombrexml);

        return ('RESUMEN: XML FIRMADO Y ZIPEADO CON EXITO');
    }

    public function bajacreate()
    {
        $emisor = Emisor::all();
        $tipomoneda = TipoMoneda::all();
        $tipocomprobante = TipoComprobante::all();
        $tipodocumento = TipoDocumento::all();
        $motivo = TablaParametrica::where(TablaParametricaTableInfo::TIPO, 'D')->get();
        return view('notadebito.create', compact('emisor', 'tipomoneda', 'tipocomprobante', 'tipodocumento', 'motivo'));
    }
}
