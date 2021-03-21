<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecurityKey;

class Signature
{
    public function signature_xml($flg_firma, $nombrexml, $ruta_certificado, $pass_certificado)
    {
        $doc = new \DOMDocument();
        $doc->formatOutput = FALSE;
        $doc->preserveWhiteSpace = TRUE;
        $doc->loadXML(Storage::get('xml/'.$nombrexml.'.xml'));

        $objDSig = new XMLSecurityDSig(FALSE);
        $objDSig->setCanonicalMethod(XMLSecurityDSig::EXC_C14N);
        $options['force_uri'] = TRUE;
        $options['id_name'] = 'ID';
        $options['overwrite'] = FALSE;

        $objDSig->addReference($doc, XMLSecurityDSig::SHA1, array('http://www.w3.org/2000/09/xmldsig#enveloped-signature'), $options);
        $objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1, array('type' => 'private'));

        $pfx = $ruta_certificado;
        $key = array();

        openssl_pkcs12_read($pfx, $key, $pass_certificado);
        $objKey->loadKey($key["pkey"]);
        $objDSig->add509Cert($key["cert"], TRUE, FALSE);
        $objDSig->sign($objKey, $doc->documentElement->getElementsByTagName("ExtensionContent")->item($flg_firma));

        $atributo = $doc->getElementsByTagName('Signature')->item(0);
        $atributo->setAttribute('Id', 'SignatureSP');

        $hash_cpe = $doc->getElementsByTagName('DigestValue')->item(0)->nodeValue;
        $firma_cpe = $doc->getElementsByTagName('SignatureValue')->item(0)->nodeValue;

        $doc_string =$doc->saveXML();
        Storage::disk('local')->put('xml/'.$nombrexml.'.xml', $doc_string);
        $resp['respuesta'] = 'ok';
        $resp['hash_cpe'] = $hash_cpe;
        $resp['firma_cpe'] = $firma_cpe;

        return $resp;
    }
}
