<?php

namespace Invoiceninja\Einvoice\Tests\Data;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Serializer\Serializer;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\ValidatorBuilder;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronica;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaBody;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaHeader;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;

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
                            DDDDDDDDDDDDDDD E FFFFFFFFFFFFFFFFFFFF GGGGSSSSSS',
                    1 => 'SEGUE DESCRIZIONE CAUSALE NEL CASO IN CUI NON SIANO STATI SUFFICIENTI 200
                            CARATTERI AAAAA',
                ],
                ],
                'DatiOrdineAcquisto' => [
                'RiferimentoNumeroLinea' => 1,
                'IdDocumento' => '66685',
                'NumItem' => '1',
                'CodiceCUP' => '123abc',
                'CodiceCIG' => '456def',
                ],
                'DatiContratto' => [
                'RiferimentoNumeroLinea' => 1,
                'IdDocumento' => '123',
                'Data' => '2016-09-01',
                'NumItem' => '5',
                'CodiceCUP' => '123abc',
                'CodiceCIG' => '456def',
                ],
                'DatiConvenzione' => [
                'RiferimentoNumeroLinea' => 1,
                'IdDocumento' => '456',
                'NumItem' => '5',
                'CodiceCUP' => '123abc',
                'CodiceCIG' => '456def',
                ],
                'DatiRicezione' => [
                'RiferimentoNumeroLinea' => 1,
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
                'NumeroLinea' => 1,
                'Descrizione' => 'DESCRIZIONE DELLA FORNITURAa',
                'Quantita' => "5.00",
                'PrezzoUnitario' => "1.00",
                'PrezzoTotale' => "5.00",
                'AliquotaIVA' => "22.00",
                ],
                'DatiRiepilogo' => [
                'AliquotaIVA' => "22.00",
                'ImponibileImporto' => "5.00",
                'Imposta' => "1.10",
                'EsigibilitaIVA' => 'I',
                ],
            ],
            'DatiPagamento' => [
                'CondizioniPagamento' => 'TP01',
                'DettaglioPagamento' => [
                'ModalitaPagamento' => 'MP01',
                'DataScadenzaPagamento' => '2017-02-18',
                'ImportoPagamento' => "6.10",
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
            'NumeroLinea' => 1,
            'Descrizione' => 'DESCRIZIONE DELLA FORNITURA',
            'Quantita' => 5.00,
            'PrezzoUnitario' => 1.00,
            'PrezzoTotale' => 5.00,
            'AliquotaIVA' => 22.00,
            ],
            'DatiRiepilogo' => [
            'AliquotaIVA' => 22.00,
            'ImponibileImporto' => 5.00,
            'Imposta' => 1.10,
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

    public function initSerializer(): Serializer
    {

        $phpDocExtractor = new PhpDocExtractor();
        $reflectionExtractor = new ReflectionExtractor();

        // list of PropertyListExtractorInterface (any iterable)
        $listExtractors = [$reflectionExtractor];

        // list of PropertyTypeExtractorInterface (any iterable)
        $typeExtractors = [$reflectionExtractor,$phpDocExtractor];

        // list of PropertyDescriptionExtractorInterface (any iterable)
        $descriptionExtractors = [$phpDocExtractor];

        // list of PropertyAccessExtractorInterface (any iterable)
        $accessExtractors = [$reflectionExtractor];

        // list of PropertyInitializableExtractorInterface (any iterable)
        $propertyInitializableExtractors = [$reflectionExtractor];

        $propertyInfo = new PropertyInfoExtractor(
            // $listExtractors,
            $propertyInitializableExtractors,
            $descriptionExtractors,
            $typeExtractors,
            // $accessExtractors,
        );

        
        $context = [
            'xml_format_output' => true,
        ];

        $encoder = new XmlEncoder($context);

        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        
        $discriminator = new ClassDiscriminatorFromClassMetadata($classMetadataFactory);

        $normalizer = new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, $propertyInfo);
        $normalizers = [  $normalizer,  new ArrayDenormalizer() , new DateTimeNormalizer()];
        $encoders = [$encoder, new JsonEncoder()];



// $encoders = [new JsonEncoder(), new XmlEncoder()];
// $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);
// $normalizers = [new PropertyNormalizer($classMetadataFactory),new ArrayDenormalizer(),new GetSetMethodNormalizer(), new ObjectNormalizer(null, null, null, $extractor),];


// $serializer = new Serializer([new ObjectNormalizer($classMetadataFactory, null, null, null,$discriminator), new ArrayDenormalizer(), new GetSetMethodNormalizer()], [new XmlEncoder(), new JsonEncoder()]);

// $serializer = new Serializer([ new ArrayDenormalizer(), new GetSetMethodNormalizer(),new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, $propertyInfo, $discriminator), 
//   ], [new XmlEncoder(), new JsonEncoder()]);

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer;

    }

//     public function testBasicFirstLevel()
//     {

//         $context = [
//             // AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => false,
//             // 'skip_null_values' => false, // Skip null values
//         ];

//         $serializer = $this->initSerializer();

//         $fattura = $serializer->deserialize(json_encode($this->good_payload), FatturaElettronica::class, 'json', $context);
// echo "testBasicFirstLevel".PHP_EOL;
// echo print_r($fattura).PHP_EOL;

//         $validator = Validation::createValidatorBuilder()
//             ->enableAttributeMapping()
//             ->getValidator();

//         $errors = $validator->validate($fattura);

//         foreach($errors as $error)
//             echo $error->getPropertyPath() . ': ' . $error->getMessage() . "\n";

//         $this->assertCount(0, $errors);


// $this->assertNotNull($fattura->FatturaElettronicaHeader);

// $this->assertNotNull($fattura->FatturaElettronicaBody);



//     }

    public function testBadPayloadValidation()
    {
        $context = [];

        $serializer = $this->initSerializer();

        $x = $serializer->deserialize(json_encode($this->bad_payload), FatturaElettronica::class, 'json');

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $errors = $validator->validate($x);

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                // echo $error->getPropertyPath() . ': ' . $error->getMessage() . "\n";
            }
        } else {
            // echo "Validation passed!\n";
        }

        $this->assertGreaterThan(0, count($errors));

    }

    public function testValidation()
    {
        $files = [
            'tests/Data/samples/fatturapa0.xml',
            'tests/Data/samples/fatturapa1.xml',
            'tests/Data/samples/fatturapa2.xml',
            'tests/Data/samples/fatturapa3.xml',
            'tests/Data/samples/fatturapa4.xml',
            'tests/Data/samples/fatturapa5.xml',
            'tests/Data/samples/fatturapa6.xml',
        ];

        $path = 'tests/Data/samples/';
        
        $context = [];

        $serializer = $this->initSerializer();

        foreach($files as $key => $f)
        {
            echo($f).PHP_EOL;

            $xmlstring = file_get_contents($f);

            $data = $serializer->deserialize($xmlstring, FatturaElettronica::class, 'xml');

            // $this->assertNotNull($data->FatturaElettronicaBody->DatiBeniServizi);
            // echo print_r($data);
            $fpathjson = $path."{$key}.json";
            // echo print_r($data).PHP_EOL;
            $fp = fopen($fpathjson, 'w');
            fwrite($fp, json_encode($data, JSON_PRETTY_PRINT));
            fclose($fp);



        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $errors = $validator->validate($data);


            foreach($errors as $error) {
                echo $error->getPropertyPath() . ': ' . $error->getMessage() . "\n";
            }


            $dataxml = $serializer->encode($data, 'xml', $context);
            $dataxml = str_replace(['<response>','</response>'], '', $dataxml);
            $fpathjson = $path."{$key}.xml";
            // echo print_r($dataxml).PHP_EOL;
            $fp = fopen($fpathjson, 'w');
            fwrite($fp, $dataxml);
            fclose($fp);

            $this->assertNotNull($data);

            // if(!$data?->FatturaElettronicaBody?->DatiBeniServizi ?? false)
            //     echo print_r($data);

            // $this->assertNotNull($data->FatturaElettronicaBody->DatiBeniServizi);
        }

    }

    public function testCountLineItems()
    {
        
        $f = 'tests/Data/samples/fatturapa0.xml';
        $xmlstring = file_get_contents($f);

        $context = [];
        $serializer = $this->initSerializer();
        $fattura = $serializer->deserialize($xmlstring, FatturaElettronica::class, 'xml');

        $validator = Validation::createValidatorBuilder()
                    ->enableAttributeMapping()
                    ->getValidator();

        $errors = $validator->validate($fattura);

        // echo print_r($fattura);
        // echo print_r($fattura->FatturaElettronicaBody->DatiBeniServizi->DettaglioLinee);
        
        $this->assertNotNull($errors);
        $this->assertCount(0, $errors);
        $this->assertNotNull($fattura);         
// echo print_r($fattura->FatturaElettronicaBody->DatiBeniServizi);

$this->assertCount(2, $fattura->FatturaElettronicaBody[0]->DatiBeniServizi->DettaglioLinee);

        foreach($fattura->FatturaElettronicaBody[0]->DatiBeniServizi->DettaglioLinee as $item){

            echo print_r($item).PHP_EOL;

            echo $item->NumeroLinea.PHP_EOL;
            echo $item->PrezzoTotale.PHP_EOL;

            
        }

        // echo print_r($fattura->FatturaElettronicaBody[0]->DatiBeniServizi->DatiRiepilogo).PHP_EOL;
    }

}