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
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronica;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaBody;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaHeader;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;

class FatturaDataTest extends TestCase
{
    private $invoice;

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

        foreach($files as $key => $f)
        {
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

        foreach($files as $key => $f)
        {

            libxml_use_internal_errors(true);

            $doc = new \DOMDocument();
            $doc->load($f);
            // $validation = $doc->schemaValidate("src/Standards/FatturaPA/validation.xsl");

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

        if(count($errors) > 0)
        echo print_r($errors);

        $this->assertTrue($validation);
    }


private string $invoice_xml = 
'<?xml version="1.0" encoding="UTF-8"?>
<p:FatturaElettronica versione="FPR12" xmlns:ds="http://www.w3.org/2000/09/xmldsig#"
    xmlns:p="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2 http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.2/Schema_del_file_xml_FatturaPA_versione_1.2.xsd">
    <FatturaElettronicaHeader>
    <DatiTrasmissione>
      <IdTrasmittente>
        <IdPaese>IT</IdPaese>
        <IdCodice>01234567890</IdCodice>
      </IdTrasmittente>
      <ProgressivoInvio>ITA-36666</ProgressivoInvio>
      <FormatoTrasmissione>FPR12</FormatoTrasmissione>
      <CodiceDestinatario>ABC1234</CodiceDestinatario>
    </DatiTrasmissione>
    <CedentePrestatore>
      <DatiAnagrafici>
        <IdFiscaleIVA>
          <IdPaese>IT</IdPaese>
          <IdCodice>01234567890</IdCodice>
        </IdFiscaleIVA>
        <Anagrafica>
          <Denominazione>Untitled Company</Denominazione>
        </Anagrafica>
        <RegimeFiscale>RF01</RegimeFiscale>
      </DatiAnagrafici>
      <Sede>
        <Indirizzo>Via Silvio Spaventa 108</Indirizzo>
        <CAP>61030</CAP>
        <Comune>Calcinelli</Comune>
        <Provincia>PA</Provincia>
        <Nazione>IT</Nazione>
      </Sede>
    </CedentePrestatore>
    <CessionarioCommittente>
      <DatiAnagrafici>
        <IdFiscaleIVA>
          <IdPaese>IT</IdPaese>
          <IdCodice>262266058</IdCodice>
        </IdFiscaleIVA>
        <Anagrafica>
          <Denominazione>Italian Client Name</Denominazione>
        </Anagrafica>
      </DatiAnagrafici>
      <Sede>
        <Indirizzo>Via Antonio da Legnago 68</Indirizzo>
        <CAP>89040</CAP>
        <Comune>Monasterace</Comune>
        <Provincia>CR</Provincia>
        <Nazione>IT</Nazione>
      </Sede>
    </CessionarioCommittente>
  </FatturaElettronicaHeader>
  <FatturaElettronicaBody>
    <DatiGenerali>
      <DatiGeneraliDocumento>
        <TipoDocumento>TD01</TipoDocumento>
        <Divisa>EUR</Divisa>
        <Data>2021-04-12</Data>
        <Numero>ITA-36666</Numero>
      </DatiGeneraliDocumento>
    </DatiGenerali>
    <DatiBeniServizi>
      <DettaglioLinee>
        <NumeroLinea>1</NumeroLinea>
        <Descrizione>Product Description</Descrizione>
        <Quantita>10.00</Quantita>
        <PrezzoUnitario>10.00</PrezzoUnitario>
        <PrezzoTotale>100.00</PrezzoTotale>
        <AliquotaIVA>22.00</AliquotaIVA>
      </DettaglioLinee>
      <DatiRiepilogo>
        <AliquotaIVA>22.00</AliquotaIVA>
        <ImponibileImporto>100.00</ImponibileImporto>
        <Imposta>22.00</Imposta>
        <EsigibilitaIVA>I</EsigibilitaIVA>
      </DatiRiepilogo>
    </DatiBeniServizi>
    <DatiPagamento>
      <CondizioniPagamento>TP02</CondizioniPagamento>
      <DettaglioPagamento>
        <ModalitaPagamento>MP01</ModalitaPagamento>
        <DataScadenzaPagamento>2018-06-20</DataScadenzaPagamento>
        <ImportoPagamento>122.00</ImportoPagamento>
      </DettaglioPagamento>
    </DatiPagamento>
  </FatturaElettronicaBody>
  </p:FatturaElettronica>';

    public function testGeneratedInvoice()
    {

        libxml_use_internal_errors(true);

        $doc = new \DOMDocument();
        $doc->loadXML($this->invoice_xml);

        $validation = $doc->schemaValidate("src/Standards/FatturaPA/Schema_del_file_xml_FatturaPA_v1.2.2.xsd");

        $errors = libxml_get_errors();

        if(count($errors) > 0)
        echo print_r($errors);

        $this->assertTrue($validation);

    }
}