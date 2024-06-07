<?php

namespace InvoiceNinja\EInvoice\Tests\Data;

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
use InvoiceNinja\EInvoice\Models\FatturaPA\FatturaElettronica;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use InvoiceNinja\EInvoice\Models\FatturaPA\FatturaElettronicaBody;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use InvoiceNinja\EInvoice\Models\FatturaPA\FatturaElettronicaHeader;
use InvoiceNinja\EInvoice\Writer\FatturaPA;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;

class FatturaDataTest extends TestCase
{
    private $invoice;

    private array $bad_payload = [
        'FatturaElettronica' => [
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

        $normalizers = [  new DateTimeNormalizer(), $normalizer,  new ArrayDenormalizer() , ];
        $encoders = [$encoder, new JsonEncoder()];

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer;

    }

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

        foreach($files as $key => $f) {
            $xmlstring = file_get_contents($f);
            $data = $serializer->deserialize($xmlstring, FatturaElettronica::class, 'xml');
            $fpathjson = $path."{$key}.json";
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

        $this->assertNotNull($errors);
        $this->assertCount(0, $errors);
        $this->assertNotNull($fattura);

        $this->assertCount(2, $fattura->FatturaElettronicaBody[0]->DatiBeniServizi->DettaglioLinee);

    }


    public function testHydrationAndDehydration()
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
            $propertyInitializableExtractors,
            $descriptionExtractors,
            $typeExtractors,
        );

        $context = [
            'xml_format_output' => true,
        ];

        $encoder = new XmlEncoder($context);

        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $discriminator = new ClassDiscriminatorFromClassMetadata($classMetadataFactory);

        $normalizer = new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, $propertyInfo);

        $normalizers = [  new DateTimeNormalizer(), $normalizer,  new ArrayDenormalizer() , ];
        $encoders = [$encoder, new JsonEncoder()];

        $serializer = new Serializer($normalizers, $encoders);

        $path = 'tests/Data/samples/';

        $f = 'tests/Data/samples/fatturapa0.xml';
        $xmlstring = file_get_contents($f);

        //prevents null values from appearing
        $xmlstring = $serializer->deserialize($xmlstring, FatturaElettronica::class, 'xml');
        $fattura = $normalizer->normalize($xmlstring, 'xml', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $this->assertNotNull($fattura);
        $dataxml = $serializer->encode($fattura, 'xml', $context);
        $dataxml = str_replace(['<response>','</response>'], '', $dataxml);
        //remove any empty lines from output
        $dataxml = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $dataxml);

        $fpathjson = $path."hydra.xml";
        $fp = fopen($fpathjson, 'w');
        fwrite($fp, $dataxml);
        fclose($fp);


    }

    

    public function testSchemaValidation()
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

        foreach($files as $key => $f) {

            libxml_use_internal_errors(true);

            $doc = new \DOMDocument();
            $doc->load($f);

            // Load your XSLT stylesheet
            $xsl = new \DOMDocument();
            $xsl->load("src/Standards/FatturaPA/validation.xsl");

            // Create an XSLTProcessor instance and import the XSLT stylesheet
            $processor = new \XSLTProcessor();
            $processor->importStylesheet($xsl);


            // Perform the transformation
            $result = $processor->transformToXML($doc);


            if ($result !== false) {
                // Transformation was successful, $result contains the transformed XML
                // echo "Transformation result:\n", $result;
            } else {
                // Transformation failed
                // echo "Transformation failed.";
            }



            $errors = libxml_get_errors();

            if(count($errors) > 0)
    
            if(count($errors)>1)
            echo print_r($errors);
            // $this->assertTrue($validation);

            $this->assertCount(0, $errors);
        }

    }

    public function testFinalDocValidation()
    {

        libxml_use_internal_errors(true);

        $f = 'tests/Data/samples/fatturapa7.xml';

        $doc = new \DOMDocument();
        $doc->load($f);

        $validation = $doc->schemaValidate("src/Standards/FatturaPA/Schema_del_file_xml_FatturaPA_v1.2.2.xsd");

        $errors = libxml_get_errors();

        if(count($errors)>1)
        echo print_r($errors);

        $this->assertTrue($validation);
    }

    
    public function testClassMapper()
    {
    $f = file_get_contents("src/Schema/FatturaPA/FatturaPA.json");

    $f = json_decode($f);

        $map = [];

    foreach($f->FatturaElettronicaType->elements as $e) {

        // echo print_r($e);
        if($this->getPath($e->name)) {
            echo $e->name.PHP_EOL;
            echo $this->getPath($e->name).PHP_EOL;
            $map[$e->name] = $this->getPath($e->name);
        }
        if($f->{$e->base_type}) {

            foreach($f->{$e->base_type}->elements as $ee) {


                if($this->getPath($ee->name)) {
                    echo " ==> " .$ee->name.PHP_EOL;
                    echo $this->getPath($ee->name).PHP_EOL;
                    
                    $map[$ee->name] = $this->getPath($ee->name);

                }

                if($f->{$ee->base_type} ?? false) {

                    foreach($f->{$ee->base_type}?->elements as $eee) {

                        if($this->getPath($eee->name)) {
                            echo " ======> " .$eee->name.PHP_EOL;
                            echo $this->getPath($eee->name).PHP_EOL;
                            
                    $map[$eee->name] = $this->getPath($eee->name);

                        }
                        if($f->{$eee->base_type} ?? false) {

                            foreach($f->{$eee->base_type}?->elements as $eeee) {

                                if($this->getPath($eeee->name)) {
                                    echo " ======> " .$eeee->name.PHP_EOL;
                                    echo $this->getPath($eeee->name).PHP_EOL;
                                    
                    $map[$eeee->name] = $this->getPath($eeee->name);

                                }

                                if($f->{$eeee->base_type} ?? false) {

                                    foreach($f->{$eeee->base_type}?->elements as $eeeee) {

                                        if($this->getPath($eeeee->name)) {
                                            echo " ======> " .$eeeee->name.PHP_EOL;
                                            echo $this->getPath($eeeee->name).PHP_EOL;
                                            
                    $map[$eeeee->name] = $this->getPath($eeeee->name);

                                        }

                                    }

                                }


                            }

                        }


                    }

                }

            }

        }

            $this->assertIsArray($map);
        // echo print_r($map);
    }
    
    }

    public function testClassTraversal()
    {


    }
        
    private function getPath($string): ?string
    {
        $directoryIterator = new \RecursiveDirectoryIterator("src/Models/FatturaPA/", \RecursiveDirectoryIterator::SKIP_DOTS);

        foreach (new \RecursiveIteratorIterator($directoryIterator) as $file) {

            if($file->getFileName() == "{$string}.php") {
                
                $path = str_replace([".php","/","src"],["","\\",""], $file->getPathname());

                return "InvoiceNinja\EInvoice{$path}";

            }

            $file = null;

        }

        return null;
    }

}
