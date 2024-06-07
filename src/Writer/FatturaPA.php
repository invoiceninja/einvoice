<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2024. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace InvoiceNinja\EInvoice\Writer;

use DOMElement;

class FatturaPA extends BaseStandard
{
    public string $path = "src/Standards/FatturaPA/Schema_del_file_xml_FatturaPA_v1.2.2.xsd";

    public string $standard = "FatturaPA";

    public array $states = [
        "Abruzzo" => "AB",
        "Basilicata" => "BA",
        "Calabria" => "CA",
        "Campania" => "CM",
        "Emilia-Romagna" => "ER",
        "Friuli-Venezia Giulia" => "FV",
        "Lazio" => "LA",
        "Liguria" => "LI",
        "Lombardia" => "LO",
        "Marche" => "MA",
        "Molise" => "MO",
        "Piemonte" => "PI",
        "Puglia" => "PU",
        "Sardegna" => "SA",
        "Sicilia" => "SI",
        "Toscana" => "TO",
        "Trentino-Alto Adige" => "TR",
        "Umbria" => "UM",
        "Valle d'Aosta" => "VA",
        "Veneto" => "VE"
    ];

    //0 - do not show
    //1 - company level
    //2 - client level
    //4 - entity level

    public array $classMap = [
        'FatturaElettronicaHeader' => 'InvoiceNinja\EInvoice\Models\FatturaPA\FatturaElettronicaHeader',
        'DatiTrasmissione' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiTrasmissione',
        'IdTrasmittente' => 'InvoiceNinja\EInvoice\Models\FatturaPA\IdFiscaleType\IdTrasmittente',
        'ContattiTrasmittente' => 'InvoiceNinja\EInvoice\Models\FatturaPA\ContattiTrasmittente',
        'CedentePrestatore' => 'InvoiceNinja\EInvoice\Models\FatturaPA\CedentePrestatore',
        'DatiAnagrafici' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiAnagraficiCedenteType\DatiAnagrafici',
        'IdFiscaleIVA' => 'InvoiceNinja\EInvoice\Models\FatturaPA\IdFiscaleType\IdFiscaleIVA',
        'Anagrafica' => 'InvoiceNinja\EInvoice\Models\FatturaPA\Anagrafica',
        'Sede' => 'InvoiceNinja\EInvoice\Models\FatturaPA\IndirizzoType\Sede',
        // 'Indirizzo' => 'InvoiceNinja\EInvoice\Models\FatturaPA\Indirizzo',
        'StabileOrganizzazione' => 'InvoiceNinja\EInvoice\Models\FatturaPA\IndirizzoType\StabileOrganizzazione',
        'IscrizioneREA' => 'InvoiceNinja\EInvoice\Models\FatturaPA\IscrizioneREA',
        'Contatti' => 'InvoiceNinja\EInvoice\Models\FatturaPA\Contatti',
        'RappresentanteFiscale' => 'InvoiceNinja\EInvoice\Models\FatturaPA\RappresentanteFiscale',
        'CessionarioCommittente' => 'InvoiceNinja\EInvoice\Models\FatturaPA\CessionarioCommittente',
        'TerzoIntermediarioOSoggettoEmittente' => 'InvoiceNinja\EInvoice\Models\FatturaPA\TerzoIntermediarioSoggettoEmittenteType\TerzoIntermediarioOSoggettoEmittente',
        'FatturaElettronicaBody' => 'InvoiceNinja\EInvoice\Models\FatturaPA\FatturaElettronicaBody',
        'DatiGenerali' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiGenerali',
        'DatiGeneraliDocumento' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiGeneraliDocumento',
        'DatiRitenuta' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiRitenuta',
        'DatiBollo' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiBollo',
        'DatiCassaPrevidenziale' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiCassaPrevidenziale',
        'ScontoMaggiorazione' => 'InvoiceNinja\EInvoice\Models\FatturaPA\ScontoMaggiorazione',
        'DatiOrdineAcquisto' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiOrdineAcquisto',
        'DatiContratto' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiContratto',
        'DatiConvenzione' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiConvenzione',
        'DatiRicezione' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiRicezione',
        'DatiFattureCollegate' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiFattureCollegate',
        'DatiSAL' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiSAL',
        'DatiDDT' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiDDT',
        'DatiTrasporto' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiTrasporto',
        'DatiAnagraficiVettore' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiAnagraficiVettore',
        'IndirizzoResa' => 'InvoiceNinja\EInvoice\Models\FatturaPA\IndirizzoType\IndirizzoResa',
        'FatturaPrincipale' => 'InvoiceNinja\EInvoice\Models\FatturaPA\FatturaPrincipale',
        'DatiBeniServizi' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiBeniServizi',
        'DettaglioLinee' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DettaglioLinee',
        'CodiceArticolo' => 'InvoiceNinja\EInvoice\Models\FatturaPA\CodiceArticolo',
        'AltriDatiGestionali' => 'InvoiceNinja\EInvoice\Models\FatturaPA\AltriDatiGestionali',
        'DatiRiepilogo' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiRiepilogo',
        'DatiVeicoli' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiVeicoli',
        'DatiPagamento' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DatiPagamento',
        'DettaglioPagamento' => 'InvoiceNinja\EInvoice\Models\FatturaPA\DettaglioPagamento',
        'Allegati' => 'InvoiceNinja\EInvoice\Models\FatturaPA\Allegati',
    ];

    public array $visibility = [
        'DatiTrasmissione' => 0,
        'IdFiscale' => 7,
        'ContattiTrasmittente' => 0,
        'DatiGenerali' => 7,
        'DatiGeneraliDocumento' => 7,
        'DatiRitenuta' => 0,
        'DatiBollo' => 0,
        'DatiCassaPrevidenziale' => 0,
        'ScontoMaggiorazione' => 7,
        'DatiSAL' => 7,
        'DatiDocumentiCorrelati' => 7,
        'DatiDDT' => 0,
        'DatiTrasporto' => 7,
        'Indirizzo' => 7,
        'FatturaPrincipale' => 6,
        'CedentePrestatore' => 7,
        'DatiAnagraficiCedente' => 7,
        'Anagrafica' => 7,
        'DatiAnagraficiVettore' => 6,
        'IscrizioneREA' => 7,
        'Contatti' => 7,
        'RappresentanteFiscale' => 7,
        'DatiAnagraficiRappresentante' => 7,
        'CessionarioCommittente' => 7,
        'RappresentanteFiscaleCessionario' => 7,
        'DatiAnagraficiCessionario' => 7,
        'DatiBeniServizi' => 7,
        'DatiVeicoli' => 0,
        'DatiPagamento' => 7,
        'DettaglioPagamento' => 7,
        'TerzoIntermediarioSoggettoEmittente' => 7,
        'DatiAnagraficiTerzoIntermediario' => 7,
        'Allegati' => 0,
        'DettaglioLinee' => 0,
        'CodiceArticolo' => 0,
        'AltriDatiGestionali' => 0,
        'DatiRiepilogo' => 0,
        'DatiDDTType' => 0,
        'DatiDocumentiCorrelatiType' => 0,
        'ScontoMaggiorazioneType' => 0,
        'DatiCassaPrevidenzialeType' => 0,
        'DatiBolloType' => 0,
        'DatiRitenutaType' => 0,
        'ContattiTrasmittenteType' => 0,
        'IdFiscaleType' => 0,
        'DatiSALType' => 0,
        'DatiDocumentiCorrelatiType' => 0,
        'DatiVeicoliType' => 0,
        'DettaglioPagamentoType' => 6,
    ];

    public array $vis = [
    "FatturaElettronicaType" => [
        "FatturaElettronicaHeader" => 7,
        "FatturaElettronicaBody" => 7,
    ],
    "FatturaElettronicaHeaderType" => [
        "DatiTrasmissione" => 0,
        "CedentePrestatore" => 7,
        "RappresentanteFiscale" => 7,
        "CessionarioCommittente" => 6,
        "TerzoIntermediarioOSoggettoEmittente" => 7,
        "SoggettoEmittente" => 7,
    ],
    "FatturaElettronicaBodyType" => [
        "DatiGenerali" => 7,
        "DatiBeniServizi" => 4,
        "DatiVeicoli" => 7,
        "DatiPagamento" => 6,
        "Allegati" => 6,
    ],
    "DatiTrasmissioneType" => [
        "IdTrasmittente" => 0,
        "ProgressivoInvio" => 0,
        "FormatoTrasmissione" => 0,
        "CodiceDestinatario" => 0,
        "ContattiTrasmittente" => 0,
        "PECDestinatario"  => 0
    ],
    "IdFiscaleType" => [
        "IdPaese" => 0,
        "IdCodice" => 0,
    ],
    "ContattiTrasmittenteType" => [
        "Telefono" => 7,
        "Email" => 7,
    ],
    "DatiGeneraliType" => [
        "DatiGeneraliDocumento" => 6,
        "DatiOrdineAcquisto" => 6,
        "DatiContratto" => 6,
        "DatiConvenzione" => 6,
        "DatiRicezione" => 6,
        "DatiFattureCollegate" => 6,
        "DatiSAL" => 6,
        "DatiDDT" => 6,
        "DatiTrasporto" => 6,
        "FatturaPrincipale" => 6
    ],
    "DatiGeneraliDocumentoType" => [
        "TipoDocumento" => 6,
        "Divisa" => 6,
        "Data" => 6,
        "Numero" => 6,
        "DatiRitenuta" => 6,
        "DatiBollo" => 6,
        "DatiCassaPrevidenziale" => 6,
        "ScontoMaggiorazione" => 6,
        "ImportoTotaleDocumento" => 6,
        "Arrotondamento" => 6,
        "Causale" => 6,
        "Art73" => 6,
    ],
    "DatiRitenutaType" => [
        "TipoRitenuta" => 6,
        "ImportoRitenuta" => 6,
        "AliquotaRitenuta" => 6,
        "CausalePagamento" => 6
    ],
    "DatiBolloType" => [
        "BolloVirtuale" => 6,
        "ImportoBollo" => 6
    ],
    "DatiCassaPrevidenzialeType" => [
        "TipoCassa" => 0,
        "AlCassa" => 0,
        "ImportoContributoCassa" => 0,
        "ImponibileCassa" => 0,
        "AliquotaIVA" => 0,
        "Ritenuta" => 0,
        "Natura" => 0,
        "RiferimentoAmministrazione" => 0,
    ],
    "ScontoMaggiorazioneType" => [
        "Tipo" => 7,
        "Percentuale" => 7,
        "Importo" => 7
    ],
    "DatiSALType" => [
        "RiferimentoFase" => 0
    ],
    "DatiDocumentiCorrelatiType" => [
        "RiferimentoNumeroLinea" => 0,
        "IdDocumento" => 0,
        "Data" => 0,
        "NumItem" => 0,
        "CodiceCommessaConvenzione" => 0,
        "CodiceCUP" => 0,
        "CodiceCIG" => 0,
    ],
    "DatiDDTType" => [
        "NumeroDDT" => 0,
        "DataDDT" => 0,
        "RiferimentoNumeroLinea" => 0,
    ],
    "DatiTrasportoType" => [
        "DatiAnagraficiVettore" => 0,
        "MezzoTrasporto" => 0,
        "CausaleTrasporto" => 0,
        "NumeroColli" => 0,
        "Descrizione" => 0,
        "UnitaMisuraPeso" => 0,
        "PesoLordo" => 0,
        "PesoNetto" => 0,
        "DataOraRitiro" => 0,
        "DataInizioTrasporto" => 0,
        "TipoResa" => 0,
        "IndirizzoResa" => 0,
        "DataOraConsegna" => 0,
    ],
    "IndirizzoType" => [
        "Indirizzo" => 7,
        "NumeroCivico" => 7,
        "CAP" => 7,
        "Comune" => 7,
        "Provincia" => 7,
        "Nazione" => 7,
    ],
    "FatturaPrincipaleType" => [
        "NumeroFatturaPrincipale" => 0,
        "DataFatturaPrincipale" => 0,
    ],
    "CedentePrestatoreType" => [
        "DatiAnagrafici" => 7,
        "Sede" => 7,
        "StabileOrganizzazione" => 7,
        "IscrizioneREA" => 7,
        "Contatti" => 7,
        "RiferimentoAmministrazione" => 7,
    ],
    "DatiAnagraficiCedenteType" => [
        "IdFiscaleIVA" => 6,
        "CodiceFiscale" => 6,
        "Anagrafica" => 6,
        "AlboProfessionale" => 6,
        "ProvinciaAlbo" => 6,
        "NumeroIscrizioneAlbo" => 6,
        "DataIscrizioneAlbo" => 6,
        "RegimeFiscale" => 6,
    ],
    "AnagraficaType" => [
        "Denominazione" => 6,
        "Titolo" => 6,
        "CodEORI" => 6,
    ],
    "DatiAnagraficiVettoreType" => [
        "IdFiscaleIVA" => 0,
        "CodiceFiscale" => 0,
        "Anagrafica" => 0,
        "NumeroLicenzaGuida" => 0,
    ],
    "IscrizioneREAType" => [
        "Ufficio" => 0,
        "NumeroREA" => 0,
        "CapitaleSociale" => 0,
        "SocioUnico" => 0,
        "StatoLiquidazione" => 0,
    ],
    "ContattiType" => [
        "Telefono" => 6,
        "Fax" => 6,
        "Email" => 6,
    ],
    "RappresentanteFiscaleType" => [
        "DatiAnagrafici" => 6,
    ],
    "DatiAnagraficiRappresentanteType" => [
        "IdFiscaleIVA" => 7,
        "CodiceFiscale" => 7,
        "Anagrafica" => 7,
    ],
    "CessionarioCommittenteType" => [
        "DatiAnagrafici" => 6,
        "Sede" => 6,
        "StabileOrganizzazione" => 6,
        "RappresentanteFiscale" => 6,
    ],
    "RappresentanteFiscaleCessionarioType" => [
        "IdFiscaleIVA" => 7,
    ],
    "DatiAnagraficiCessionarioType" => [
        "IdFiscaleIVA" => 6,
        "CodiceFiscale" => 6,
        "Anagrafica" => 6,
    ],
    "DatiBeniServiziType" => [
        "DettaglioLinee" => 0,
        "DatiRiepilogo" => 0,
    ],
    "DatiVeicoliType" => [
        "Data" => 0,
        "TotalePercorso" => 0,
    ],
    "DatiPagamentoType" => [
        "CondizioniPagamento" => 7,
        "DettaglioPagamento" => 7,
    ],
    "DettaglioPagamentoType" => [
        "Beneficiario" => 6,
        "ModalitaPagamento" => 6,
        "DataRiferimentoTerminiPagamento" => 6,
        "GiorniTerminiPagamento" => 6,
        "DataScadenzaPagamento" => 6,
        "ImportoPagamento" => 6,
        "CodUfficioPostale" => 6,
        "CognomeQuietanzante" => 6,
        "NomeQuietanzante" => 6,
        "CFQuietanzante" => 6,
        "TitoloQuietanzante" => 6,
        "IstitutoFinanziario" => 6,
        "IBAN" => 6,
        "ABI" => 6,
        "CAB" => 6,
        "BIC" => 6,
        "ScontoPagamentoAnticipato" => 6,
        "DataLimitePagamentoAnticipato" => 6,
        "PenalitaPagamentiRitardati" => 6,
        "DataDecorrenzaPenale" => 6,
        "CodicePagamento" => 6,
    ],
    "TerzoIntermediarioSoggettoEmittenteType" => [
        "DatiAnagrafici" => 0,
    ],
    "DatiAnagraficiTerzoIntermediarioType" => [
        "IdFiscaleIVA" => 0,
        "CodiceFiscale" => 0,
        "Anagrafica" => 0,
    ],
    "AllegatiType" => [
        "NomeAttachment" => 0,
        "AlgoritmoCompressione" => 0,
        "FormatoAttachment" => 0,
        "DescrizioneAttachment" => 0,
        "Attachment" => 0,
    ],
    "DettaglioLineeType" => [
        "NumeroLinea" => 0,
        "TipoCessionePrestazione" => 0,
        "CodiceArticolo" => 0,
        "Descrizione" => 0,
        "Quantita" => 0,
        "UnitaMisura" => 0,
        "DataInizioPeriodo" => 0,
        "DataFinePeriodo" => 0,
        "PrezzoUnitario" => 0,
        "ScontoMaggiorazione" => 0,
        "PrezzoTotale" => 0,
        "AliquotaIVA" => 0,
        "Ritenuta" => 0,
        "Natura" => 0,
        "RiferimentoAmministrazione" => 0,
        "AltriDatiG0estionali" => 0,
    ],
    "CodiceArticoloType" => [
        "CodiceTipo" => 4,
        "CodiceValore" => 4,
    ],
    "AltriDatiGestionaliType" => [
        "TipoDato" => 0,
        "RiferimentoTesto" => 0,
        "RiferimentoNumero" => 0,
        "RiferimentoDat0a" => 0,
    ],
    "DatiRiepilogoType" => [
        "AliquotaIVA" => 0,
        "Natura" => 0,
        "SpeseAccessorie" => 0,
        "Arrotondamento" => 0,
        "ImponibileImporto" => 0,
        "Imposta" => 0,
        "EsigibilitaIVA" => 0,
        "RiferimentoNormativo" => 0,
    ]
    ];

    /** Regex patterns need to be converted into preg_match equivalents */
    private array $regex_conversion_array =
        [
            '(\p{IsBasicLatin}{1,10})'  => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,10}/u',
            '[A-Z0-9]{6,7}' => '/[A-Z0-9]{6,7}/',
            'email' => '/^(?!.*\.\.)(?!.*\.$)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            '[A-Z]{2}' => '/[A-Z]{2}/',
            '.+@.+[.]+.+' => '/.+@.+\..+/',
            '[A-Z]{3}' => '/[A-Z]{3}/',
            '[\\-]?[0-9]{1,11}\\.[0-9]{2}' => '/[\-]?[0-9]{1,11}\.[0-9]{2}/',
            '[\\-]?[0-9]{1,11}\\.[0-9]{2,8}' => '/[\-]?[0-9]{1,11}\.[0-9]{2,8}/',
            '[0-9]{1,3}\\.[0-9]{2}' => '/[0-9]{1,3}\.[0-9]{2}/',
            '[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,100}' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,100}/u',
            '(\\p{IsBasicLatin}{1,15})' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,15}/u',
            '[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,80}' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,80}/u',
            '[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,1000}' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,1000}/u',
            '(\\p{IsBasicLatin}{1,8})' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,8}/u',
            '[0-9][0-9][0-9][0-9][0-9]' => '/[0-9]{5}/',
            '[A-Z0-9]{11,16}' => '/[A-Z0-9]{11,16}/',
            '[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{11,30}' => '/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{11,30}/',
            '[A-Z]{6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3}){0,1}' => '/[A-Z]{6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3})?/',
            '[0-9]{1,12}\\.[0-9]{2,8}' => '/[0-9]{1,12}\.[0-9]{2,8}/',
            '[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,60}/u',
            '(\\p{IsBasicLatin}{1,60})' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,60}/u',
            '(\\p{IsBasicLatin}{2,10})' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{2,10}/u',
            '[A-Z]{2}' => '/[A-Z]{2}/',
            '(\\p{IsBasicLatin}{1,20})' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,20}/u',
            '[\\-]?[0-9]{1,11}\\.[0-9]{2}' => '/[\-]?[0-9]{1,11}\.[0-9]{2}/',
            '(\\p{IsBasicLatin}{5,12})' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{5,12}/u',
            '(\\p{IsBasicLatin}{1,15})' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,15}/u',
            '[\\p{IsBasicLatin}\\p{IsLatin-1Supplement}]{1,200}' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,200}/u',
            '[A-Z0-9]{16}' => '/[A-Z0-9]{16}/',
            '[0-9]{1,4}\.[0-9]{1,2}' => '/[0-9]{1,4}\.[0-9]{1,2}/',
            '(\\p{IsBasicLatin}{1,35})' => '/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,35}/u',
        ];

    public function __construct()
    {

    }

    public function init()
    {

        $this->document = new \DomDocument();

        $this->document->load($this->path);

        $this->mapTypes()
        ->getParentTypes()
        ->write();

    }

    /**
     * getParentTypes
     *
     * Iterate through all complex types of the schema definition
     * and build type and element maps
     *
     * @return self
     */
    private function getParentTypes(): self
    {


        $complexTypes = $this->document->getElementsByTagName('complexType');

        foreach($complexTypes as $type) {

            $set = [];

            if($type instanceof \DOMElement) {

                $set['type'] = $type->getAttribute('name');
                $set['help'] = $this->extractAnnotation($type);

                $sequence = $this->extractSequence($type);

                $choice_array = $this->extractChoice($sequence->item(0));

                $choice_keys = [];

                foreach($choice_array as $key => $arr) {
                    $choice_keys[] = array_keys($arr);
                }

                $set['choices'] = $choice_keys;

                $sequence_list = $this->processSequences($sequence);

                $set['elements'] = count($sequence_list) > 0 ? $sequence_list : [];

                if(isset($this->visibility[$set['type']]) && $this->visibility[$set['type']] == 0) {
                    $set['visibility'] = 0;
                } else {
                    $set['visibility'] = $this->getVisibility($set['type']) ?? 0;
                }

                $this->data[$set['type']] = $set;

            }
        }

        return $this;
    }

    private function getVisibility(string $type): int
    {
        if(isset($this->vis[$type])) {
            return 7;
        }

        foreach($this->vis as $key => $value) {

            if(isset($this->vis[$key][$type])) {
                return $this->vis[$key][$type];
            }

        }

        return 0;
    }

    /**
     * processSequences
     *
     * Harvests a list of child elements of the "Type:
     *
     * @param  \DOMNodeList $list
     * @return array
     */
    private function processSequences(\DOMNodeList $list): array
    {
        $data = [];

        for($x = 0; $x < $list->count(); $x++) {
            $node = $list->item($x);

            $choice_array = $this->extractChoice($node);

            foreach($choice_array as $selection) {
                foreach($selection as $key => $select) {

                    $select['resource'] = $this->extractResource($select['type'] ?? $select['base_type']);
                    $select['visibility'] = 7;
                    $select = array_merge($select, $this->extractRestriction($select['type'] ?? $select['base_type']));
                    $data[$key] = $select;
                }
            }

            $child_array = [];

            foreach($node->childNodes as $childNode) {

                if($childNode instanceof \DomElement) {
                    $child_array = $this->extractAttributes($childNode);

                    if(is_array($child_array) && !isset($child_array['name']) || is_null($child_array['name'])) {
                        continue;
                    }

                    if(count($child_array) > 0) {

                        $child_array['help'] = $this->extractAnnotation($childNode);
                        $child_array['resource'] = $this->extractResource($child_array['type'] ?? $child_array['base_type']);

                        $child_array = array_merge($child_array, $this->extractRestriction($child_array['type'] ?? $child_array['base_type']));
                        unset($child_array['type']);

                        if(!isset($child_array['base_type']) && isset($child_array['name'])) {
                            $child_array['base_type'] = $this->type_map[$child_array['name']];
                        }

                        $child_array['base_type'] = str_replace(["xs:","xs:"], "", $child_array['base_type']);
                        $child_array['visibility'] = $this->getVisibility($child_array['base_type']);

                        if(isset($child_array['pattern']) && strlen($child_array['pattern']) > 2 && substr($child_array['pattern'], 0, 1) != '/') {

                            if(strlen($child_array['pattern']) > 50) {
                                $child_array['pattern'] = $this->regex_conversion_array['email'];
                            } else {
                                $child_array['pattern'] = '/'.$child_array['pattern'].'/';
                            }
                        }


                        $data[$child_array['name']] = array_merge($this->stub_validation, $child_array);

                    }

                }

            }

        }

        return $data;

    }

    /**
     * processChoiceSequence
     *
     * Some types require a choice between
     * sets of fields, the choice array
     * holds the "choice keys" of each set
     * @param  DomNodeList $list
     * @return array
     */
    private function processChoiceSequence(\DomNodeList $list): array
    {

        $data = [];

        for($x = 0; $x < $list->count(); $x++) {
            $node = $list->item($x);

            $child_array = [];

            foreach($node->childNodes as $childNode) {

                if($childNode instanceof \DomElement) {

                    $key = $childNode->getAttribute('name');

                    $child_array[$key] = array_merge($this->stub_validation, $this->extractAttributes($childNode));

                }

            }

            $data[] = $child_array;

        }

        return $data;

    }


    private function extractAttributes(\DomElement $childNode): array
    {
        $child_array = [];

        foreach($childNode->attributes as $key => $attr) {
            if(in_array($attr->nodeName, ['name','type','minOccurs','maxOccurs'])) {

                if($attr->nodeName == 'type') {
                    $key = 'base_type';
                } elseif($attr->nodeName == 'minOccurs') {
                    $key = 'min_occurs';
                } elseif($attr->nodeName == 'maxOccurs') {
                    $key = 'max_occurs';
                } else {
                    $key = $attr->nodeName;
                }

                $child_array[$key] = is_numeric($attr->nodeValue) ? (int)$attr->nodeValue : $attr->nodeValue;
            }
        }

        if(!isset($child_array['min_occurs'])) {
            $child_array['min_occurs'] = 1;
        }

        if(!isset($child_array['max_occurs'])) {
            $child_array['max_occurs'] = 1;
        }

        $child_array['max_occurs'] = $child_array['max_occurs'] == 'unbounded' ? -1 : $child_array['max_occurs'];

        return $child_array;

    }

    private function extractSequence(\DomElement $element): \DOMNodeList
    {

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:sequence', $element);

        return $result;
    }

    private function extractChoice(\DomElement $element): array
    {
        $data = [];

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:choice//xs:sequence', $element);

        $data = $this->processChoiceSequence($result);

        return $data;

    }

    private function extractAnnotation(\DomElement $element): string
    {

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:annotation//xs:documentation', $element);

        return $result->count() > 0 ? $result->item(0)->nodeValue : '';

    }

    private function mapTypes(): self
    {

        $types = $this->document->getElementsByTagName('element');

        foreach($types as $type) {
            if($type instanceof \DOMElement && $type->hasAttribute(('type'))) {
                $this->type_map[$type->getAttribute(('name'))] = $type->getAttribute('type');
            }
        }

        return $this;
    }


    /**
     * extractResource
     *
     * Extracts the dropdown selection key/value pairs
     *
     * @param  ?string $type
     * @return array
     */
    public function extractResource(?string $type): array
    {
        if(!$type) {
            return [];
        }

        $resource = [];

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:simpleType [@name="'.$type.'"]//xs:restriction');

        if($result->count() == 0) {
            return $resource;
        }

        $node = $result->item(0);

        foreach($node->childNodes as $childNode) {

            if($childNode instanceof \DomElement && $childNode->localName == 'enumeration') {

                $key = $childNode->getAttribute('value');
                $annotation = $this->extractAnnotation($childNode);

                $resource[$key] = strlen($annotation) > 1 ? $annotation : $key;

            }

        }

        return $resource;
    }

    /**
     * extractRestriction
     *
     * Returns the required validation array
     *
     * @param  string $type
     * @return array
     */
    private function extractRestriction(string $type): array
    {
        $resource = [];

        $xpath = new \DOMXPath($this->document);
        $result = $xpath->query('./xs:simpleType [@name="'.$type.'"]//xs:restriction');

        if($result->count() == 0) {
            return $resource;
        }

        $node = $result->item(0);

        if($node instanceof DOMElement) {

            if($node->hasAttribute('base')) {
                $resource['base_type'] = str_replace("xs:", "", $node->getAttribute('base'));
            } else {
                $resource['base_type'] = $this->type_map[$type] ?? str_replace("xs:", "", $type);
            }

            foreach($node->childNodes as $childNode) {

                if($childNode instanceof \DomElement) {

                    if(!in_array($childNode->localName, ['enumeration']) && in_array($childNode->localName, array_keys($this->stub_validation))) {

                        $resource[$this->camelToSnake($childNode->localName)] = $childNode->getAttribute("value");

                    }
                    if(in_array($childNode->localName, ['minLength','maxLength'])) {

                        $resource[$this->camelToSnake($childNode->localName)] = (int)$childNode->getAttribute("value");
                        $resource['base_type'] = 'string';

                    }
                }

            }
        }

        //Extracts the regex pattern
        if(isset($resource['pattern'])) {
            $resource = $this->extractPattern($resource);
        }

        return $resource;

    }


    /**
     * extractPattern
     *
     * @param  array $resource
     * @return array
     */
    private function extractPattern($resource): array
    {
        $parts = [];

        if (preg_match('/{([^{}]+)}[^{}]*$/', $resource['pattern'] ?? '', $matches)) {
            $contents = $matches[1];
            $parts = explode(",", $contents);

            $resource['pattern'] = $this->regex_conversion_array[$resource['pattern']];
        }

        if(count($parts) == 2 && $resource['base_type'] == 'normalizedString') {

            $resource['min_length'] = (int)$parts[0];
            $resource['max_length'] = (int)$parts[1];
            $resource['base_type'] = 'string';

            return $resource;
        }

        if(count($parts) == 1 && $resource['base_type'] == 'string') {

            $resource['min_length'] = (int)$parts[0];
            $resource['max_length'] = (int)$parts[0];
            $resource['base_type'] = 'string';

            return $resource;
        }

        if(count($parts) == 2 && $resource['base_type'] == 'string') {

            $resource['min_length'] = (int)$parts[0];
            $resource['max_length'] = (int)$parts[1];
            $resource['base_type'] = 'string';

            return $resource;
        }

        return $resource;

    }

}
