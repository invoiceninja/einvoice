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

    public function testBadPayloadValidation(): void
    {
        $serializer = $this->initSerializer();
        $invoice = $serializer->deserialize(file_get_contents('tests/Data/samples/fatturapa0.xml'), FatturaElettronica::class, 'xml');
        $validator = Validation::createValidatorBuilder()->enableAttributeMapping()->getValidator();
        $this->assertCount(0, $validator->validate($invoice));

        // Start from a valid, correctly shaped payload so root errors cannot mask the nested constraint.
        $payload = $serializer->normalize($invoice, null, [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
        $payload['FatturaElettronicaHeader']['DatiTrasmissione']['FormatoTrasmissione'] = 'INVALID';
        $invoice = $serializer->denormalize($payload, FatturaElettronica::class);
        $errors = $validator->validate($invoice);

        $this->assertCount(1, $errors);
        $this->assertSame('FatturaElettronicaHeader.DatiTrasmissione.FormatoTrasmissione', $errors[0]->getPropertyPath());
        $this->assertSame(\Symfony\Component\Validator\Constraints\Choice::NO_SUCH_CHOICE_ERROR, $errors[0]->getCode());
    }

    public function testValidation(): void
    {
        $serializer = $this->initSerializer();
        $validator = Validation::createValidatorBuilder()->enableAttributeMapping()->getValidator();

        for ($index = 0; $index <= 6; ++$index) {
            $file = "tests/Data/samples/fatturapa{$index}.xml";
            $invoice = $serializer->deserialize(file_get_contents($file), FatturaElettronica::class, 'xml');
            $errors = $validator->validate($invoice);
            $this->assertCount(0, $errors, $file . ': ' . (string) $errors);
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
        //remove any empty lines from output
        $dataxml = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $dataxml);

        $round_trip = $serializer->deserialize($dataxml, FatturaElettronica::class, 'xml');
        $this->assertEquals($xmlstring, $round_trip);
    }

    public function testHtmlTransformation(): void
    {
        // validation.xsl renders HTML; it is not an XSD or schematron validator.
        $previous = libxml_use_internal_errors(true);
        libxml_clear_errors();
        try {
            $stylesheet = new \DOMDocument();
            $this->assertTrue($stylesheet->load('src/Standards/FatturaPA/validation.xsl'));
            $processor = new \XSLTProcessor();
            $this->assertTrue($processor->importStylesheet($stylesheet));
            for ($index = 0; $index <= 6; ++$index) {
                $document = new \DOMDocument();
                $this->assertTrue($document->load("tests/Data/samples/fatturapa{$index}.xml"));
                $result = $processor->transformToXML($document);
                $this->assertIsString($result);
                $this->assertStringContainsString('<html', $result);
            }
            $this->assertSame([], libxml_get_errors());
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
        }
    }

    public function testClassMapper()
    {
    $f = file_get_contents("src/Schema/FatturaPA/FatturaPA.json");

    $f = json_decode($f);

        $map = [];

    foreach($f->FatturaElettronicaType->elements as $e) {

        // echo print_r($e);
        if($this->getPath($e->name)) {
            $map[$e->name] = $this->getPath($e->name);
        }
        if($f->{$e->base_type}) {

            foreach($f->{$e->base_type}->elements as $ee) {


                if($this->getPath($ee->name)) {
                    
                    $map[$ee->name] = $this->getPath($ee->name);

                }

                if($f->{$ee->base_type} ?? false) {

                    foreach($f->{$ee->base_type}?->elements as $eee) {

                        if($this->getPath($eee->name)) {
                            
                    $map[$eee->name] = $this->getPath($eee->name);

                        }
                        if($f->{$eee->base_type} ?? false) {

                            foreach($f->{$eee->base_type}?->elements as $eeee) {

                                if($this->getPath($eeee->name)) {
                                    
                    $map[$eeee->name] = $this->getPath($eeee->name);

                                }

                                if($f->{$eeee->base_type} ?? false) {

                                    foreach($f->{$eeee->base_type}?->elements as $eeeee) {

                                        if($this->getPath($eeeee->name)) {
                                            
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
