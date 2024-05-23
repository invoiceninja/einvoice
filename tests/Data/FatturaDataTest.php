<?php

namespace Invoiceninja\Einvoice\Tests\Data;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\ValidatorBuilder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronica;

class FatturaDataTest extends TestCase
{
    private $invoice;


        private array $good_payload = [
            'FatturaElettronicaHeader' => [
            'DatiTrasmissione' => [
                'IdTrasmittente' => [
                'IdPaese' => 'IT',
                'IdCodice' => '01234567890',
                ],
                'ProgressivoInvio' => '00001',
                'FormatoTrasmissione' => 'FPA12',
                'CodiceDestinatario' => 'AAAAAA',
            ],
            'CedentePrestatore' => [
                'DatiAnagrafici' => [
                'IdFiscaleIVA' => [
                    'IdPaese' => 'IT',
                    'IdCodice' => '01234567890',
                ],
                'Anagrafica' => [
                    'Denominazione' => 'ALPHA SRL',
                ],
                'RegimeFiscale' => 'RF19',
                ],
                'Sede' => [
                'Indirizzo' => 'VIALE ROMA 543',
                'CAP' => '07100',
                'Comune' => 'SASSARI',
                'Provincia' => 'SS',
                'Nazione' => 'IT',
                ],
            ],
            'CessionarioCommittente' => [
                'DatiAnagrafici' => [
                'CodiceFiscale' => '09876543210',
                'Anagrafica' => [
                    'Denominazione' => 'AMMINISTRAZIONE BETA',
                ],
                ],
                'Sede' => [
                'Indirizzo' => 'VIA TORINO 38-B',
                'CAP' => '00145',
                'Comune' => 'ROMA',
                'Provincia' => 'RM',
                'Nazione' => 'IT',
                ],
            ],
            ],
            'FatturaElettronicaBody' => [
            'DatiGenerali' => [
                'DatiGeneraliDocumento' => [
                'TipoDocumento' => 'TD01',
                'Divisa' => 'EUR',
                'Data' => '2017-01-18',
                'Numero' => '123',
                'Causale' => [
                    0 => 'LA FATTURA FA RIFERIMENTO AD UNA OPERAZIONE AAAA BBBBBBBBBBBBBBBBBB CCC
                            DDDDDDDDDDDDDDD E FFFFFFFFFFFFFFFFFFFF GGGGGGGGGG HHHHHHH II LLLLLLLLLLLLLLLLL
                            MMM NNNNN OO PPPPPPPPPPP QQQQ RRRR SSSSSSSSSSSSSS',
                    1 => 'SEGUE DESCRIZIONE CAUSALE NEL CASO IN CUI NON SIANO STATI SUFFICIENTI 200
                            CARATTERI AAAAAAAAAAA BBBBBBBBBBBBBBBBB',
                ],
                ],
                'DatiOrdineAcquisto' => [
                'RiferimentoNumeroLinea' => '1',
                'IdDocumento' => '66685',
                'NumItem' => '1',
                'CodiceCUP' => '123abc',
                'CodiceCIG' => '456def',
                ],
                'DatiContratto' => [
                'RiferimentoNumeroLinea' => '1',
                'IdDocumento' => '123',
                'Data' => '2016-09-01',
                'NumItem' => '5',
                'CodiceCUP' => '123abc',
                'CodiceCIG' => '456def',
                ],
                'DatiConvenzione' => [
                'RiferimentoNumeroLinea' => '1',
                'IdDocumento' => '456',
                'NumItem' => '5',
                'CodiceCUP' => '123abc',
                'CodiceCIG' => '456def',
                ],
                'DatiRicezione' => [
                'RiferimentoNumeroLinea' => '1',
                'IdDocumento' => '789',
                'NumItem' => '5',
                'CodiceCUP' => '123abc',
                'CodiceCIG' => '456def',
                ],
                'DatiTrasporto' => [
                'DatiAnagraficiVettore' => [
                    'IdFiscaleIVA' => [
                    'IdPaese' => 'IT',
                    'IdCodice' => '24681012141',
                    ],
                    'Anagrafica' => [
                    'Denominazione' => 'Trasporto spa',
                    ],
                ],
                'DataOraConsegna' => '2017-01-10T16:46:12.000+02:00',
                ],
            ],
            'DatiBeniServizi' => [
                'DettaglioLinee' => [
                'NumeroLinea' => '1',
                'Descrizione' => 'DESCRIZIONE DELLA FORNITURA',
                'Quantita' => '5.00',
                'PrezzoUnitario' => '1.00',
                'PrezzoTotale' => '5.00',
                'AliquotaIVA' => '22.00',
                ],
                'DatiRiepilogo' => [
                'AliquotaIVA' => '22.00',
                'ImponibileImporto' => '5.00',
                'Imposta' => '1.10',
                'EsigibilitaIVA' => 'I',
                ],
            ],
            'DatiPagamento' => [
                'CondizioniPagamento' => 'TP01',
                'DettaglioPagamento' => [
                'ModalitaPagamento' => 'MP01',
                'DataScadenzaPagamento' => '2017-02-18',
                'ImportoPagamento' => '6.10',
                ],
            ],
            ],
        
        ];

    private array $empty = [
        'FatturaElettronicaHeader' => [
        ],
        'FatturaElettronicaBody' => [
            'DatiPagamento' => [],
        ],
    ];

    private array $bad_payload = [
        'FatturaElettronica' =>[
        'FatturaElettronicaHeader' => [
        'DatiTrasmissione' => [
            'IdTrasmittente' => [
            'IdPaese' => '',
            'IdCodice' => '01234567890',
            ],
            'ProgressivoInvio' => '',
            'FormatoTrasmissione' => '',
            'CodiceDestinatario' => 'AAAAAA',
        ],
        'CedentePrestatore' => [
            'DatiAnagrafici' => [
            'IdFiscaleIVA' => [
                'IdPaese' => 'IT',
                'IdCodice' => '01234567890',
            ],
            'Anagrafica' => [
                'Denominazione' => 'ALPHA SRL',
            ],
            'RegimeFiscale' => 'RF19',
            ],
            'Sede' => [
            'Indirizzo' => 'VIALE ROMA 543',
            'CAP' => '07100',
            'Comune' => 'SASSARI',
            'Provincia' => 'SS',
            'Nazione' => 'IT',
            ],
        ],
        'CessionarioCommittente' => [
            'DatiAnagrafici' => [
            'CodiceFiscale' => '09876543210',
            'Anagrafica' => [
                'Denominazione' => 'AMMINISTRAZIONE BETA',
            ],
            ],
            'Sede' => [
            'Indirizzo' => 'VIA TORINO 38-B',
            'CAP' => '00145',
            'Comune' => 'ROMA',
            'Provincia' => 'RM',
            'Nazione' => 'IT',
            ],
        ],
        ],
        'FatturaElettronicaBody' => [
        
        'DatiBeniServizi' => [
            'DettaglioLinee' => [
            'NumeroLinea' => '1',
            'Descrizione' => 'DESCRIZIONE DELLA FORNITURA',
            'Quantita' => '5.00',
            'PrezzoUnitario' => '1.00',
            'PrezzoTotale' => '5.00',
            'AliquotaIVA' => '22.00',
            ],
            'DatiRiepilogo' => [
            'AliquotaIVA' => '22.00',
            'ImponibileImporto' => '5.00',
            'Imposta' => '1.10',
            'EsigibilitaIVA' => 'I',
            ],
        ],
        'DatiPagamento' => [
            'CondizioniPagamento' => 'TP01',
            'DettaglioPagamento' => [
            'ModalitaPagamento' => 'MP01',
            'DataScadenzaPagamento' => '2017-02-18',
            'ImportoPagamento' => '6.10',
            ],
        ],
        ],
    ],
    ];

    public function setUp(): void
    {

    }

    public function testBasicFirstLevel()
    {
        $arr = [
            'FatturaElettronica' => [
            'FatturaElettronicaHeader' => [
                'SoggettoEmittente' => 'aa'
            ],
            'FatturaElettronicaBody' => [],
        ],
        ];

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
 
        $serializer = new Serializer($normalizers, $encoders);
        $fattura = $serializer->deserialize(json_encode($arr), FatturaElettronica::class, 'json');

        echo print_r($fattura).PHP_EOL;

        $this->assertNotNull($fattura->FatturaElettronicaHeader);

    }

//     public function testSerializeAndDeserializeWithValidationSymfony()
//     {

//         $encoders = [new XmlEncoder(), new JsonEncoder()];
//         $normalizers = [new ObjectNormalizer()];

//         $context = [
//             // AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true,
//             // 'skip_null_values' => true, // Skip null values
//         //     // 'xml_root_node_name' => 'FatturaElettronica', // Define an alias for the parent tag
//             // 'xml_root_node_name' => false,
//         ];

//         // echo print_r(json_encode($this->good_payload, JSON_PRETTY_PRINT));

//         $serializer = new Serializer($normalizers, $encoders);
//         $fattura = $serializer->deserialize(json_encode($this->good_payload), FatturaElettronica::class, 'json',$context);

//         // echo print_r($fattura).PHP_EOL;

//         $this->assertNotNull($fattura->FatturaElettronicaBody->DatiBeniServizi);

//         // Create a default validator
//         $validator = Validation::createValidatorBuilder()
//             ->enableAttributeMapping()
//             ->getValidator();

//         $errors = $validator->validate($fattura);

//         $this->assertCount(0, $errors);
//         if (count($errors) > 0) {
//             foreach ($errors as $error) {
//                 // echo $error->getPropertyPath() . ': ' . $error->getMessage() . "\n";
//             }
//         } else {
//             // echo "Validation passed!\n";
//         }

//     }

//     public function testBadPayloadValidation()
//     {


//         $encoders = [new XmlEncoder(), new JsonEncoder()];
//         $normalizers = [new ObjectNormalizer()];

//         $serializer = new Serializer($normalizers, $encoders);
//         $x = $serializer->deserialize(json_encode($this->bad_payload), FatturaElettronica::class, 'json');

//         // echo print_r($x).PHP_EOL;

//         // Create a default validator
//         $validator = Validation::createValidatorBuilder()
//             ->enableAttributeMapping()
//             ->getValidator();

//         $errors = $validator->validate($x);

//         if (count($errors) > 0) {
//             foreach ($errors as $error) {
//                 // echo $error->getPropertyPath() . ': ' . $error->getMessage() . "\n";
//             }
//         } else {
//             // echo "Validation passed!\n";
//         }

//         $this->assertGreaterThan(0, count($errors));

//     }

//     public function testValidation()
//     {
//         $files = [
//             'tests/Data/samples/fatturapa0.xml',
//             'tests/Data/samples/fatturapa1.xml',
//             'tests/Data/samples/fatturapa2.xml',
//             'tests/Data/samples/fatturapa3.xml',
//             'tests/Data/samples/fatturapa4.xml',
//             'tests/Data/samples/fatturapa5.xml',
//             'tests/Data/samples/fatturapa6.xml',
//         ];

//         $path = 'tests/Data/samples/';
        
            
//         $context = [
//             'xml_format_output' => true,
//         ];
            
//         $encoder = new XmlEncoder($context);

//         $encoders = [$encoder, new JsonEncoder()];
//         $normalizers = [new ObjectNormalizer()];

        
//         // $context = [
//         //     // AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true,
//         //     // 'skip_null_values' => true, // Skip null values
//         //     'xml_root_node_name' => 'p:FatturaElettronica', // Define an alias for the parent tag
//         // ];

//         $serializer = new Serializer($normalizers, $encoders, $context);

//         foreach($files as $key => $f)
//         {
//             // echo($f).PHP_EOL;

//             $xmlstring = file_get_contents($f);

//             $data = $serializer->deserialize($xmlstring, FatturaElettronica::class, 'xml');


// $this->assertNotNull($data->FatturaElettronicaBody->DatiBeniServizi);

//             $fpathjson = $path."{$key}.json";
//             // echo print_r($data).PHP_EOL;
//             $fp = fopen($fpathjson, 'w');
//             fwrite($fp, json_encode($data, JSON_PRETTY_PRINT));
//             fclose($fp);

//             $dataxml = $serializer->encode($data, 'xml', $context);

//             $dataxml = str_replace(['<response>'],['</response>'], '', $dataxml);

//             $fpathjson = $path."{$key}.xml";
//             echo print_r($dataxml).PHP_EOL;
//             $fp = fopen($fpathjson, 'w');
//             fwrite($fp, $dataxml);
//             fclose($fp);

//             $this->assertNotNull($data);
//         }

//     }

}