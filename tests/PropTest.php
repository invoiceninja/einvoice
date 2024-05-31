<?php

namespace Invoiceninja\Einvoice\Tests;

use DOMDocument;
use PHPUnit\Framework\TestCase;

class PropTest extends TestCase
{
    public function setUp(): void
    {

    }

    public function testFactProps()
    {
        $dom = new DOMDocument();
        $dom->load("src/Standards/FACT1/UBL-Invoice-2.1.xsd");


        $elements = $dom->getElementsByTagName('element');

        foreach($elements as $element) {

            if(!$element->hasAttribute('ref')) {
                continue;
            }

            // echo $element->getAttribute('ref').PHP_EOL;
        }
    }

    public function testFatturaProps()
    {
        $dom = new DOMDocument();
        $dom->load("src/Standards/FatturaPA/Schema_del_file_xml_FatturaPA_v1.2.2.xsd");


// $complexTypes = $dom->getElementsByTagName('element');
        $complexTypes = $dom->getElementsByTagName('complexType');

        foreach($complexTypes as $type) {

            if($type->hasAttribute('name'))
                echo $type->getAttribute('name').PHP_EOL;
        }
    }
}



// DatiTrasmissione' => ,
// IdFiscale' => ,
// ContattiTrasmittente' => ,
// DatiGenerali' => ,
// DatiGeneraliDocumento' => ,
// DatiRitenuta' => ,
// DatiBollo' => ,
// DatiCassaPrevidenziale' => ,
// ScontoMaggiorazione' => ,
// DatiSAL' => ,
// DatiDocumentiCorrelati' => ,
// DatiDDT' => ,
// DatiTrasporto' => ,
// Indirizzo' => ,
// FatturaPrincipale' => ,
// CedentePrestatore' => ,
// DatiAnagraficiCedente' => ,
// Anagrafica' => ,
// DatiAnagraficiVettore' => ,
// IscrizioneREA' => ,
// Contatti' => ,
// RappresentanteFiscale' => ,
// DatiAnagraficiRappresentante' => ,
// CessionarioCommittente' => ,
// RappresentanteFiscaleCessionario' => ,
// DatiAnagraficiCessionario' => ,
// DatiBeniServizi' => ,
// DatiVeicoli' => ,
// DatiPagamento' => ,
// DettaglioPagamento' => ,
// TerzoIntermediarioSoggettoEmittente' => ,
// DatiAnagraficiTerzoIntermediario' => ,
// Allegati' => ,
// DettaglioLinee' => ,
// CodiceArticolo' => ,
// AltriDatiGestionali' => ,
// DatiRiepilogo' => ,