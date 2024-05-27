<?php

namespace Invoiceninja\Einvoice\Tests\Data;

use Milo\Schematron;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Serializer\Serializer;
use Invoiceninja\Einvoice\Models\FACT1\Invoice;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;
use Invoiceninja\Einvoice\Models\FACT1\SupplierPartyType\AccountingSupplierParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyIdentificationType\PartyIdentification;

class FACT1DataTest extends TestCase
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

    public function testFactSerializer()
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

        $normalizers = [new DateTimeNormalizer(), $normalizer,  new ArrayDenormalizer() , ];
        $encoders = [$encoder, new JsonEncoder()];

        $serializer = new Serializer($normalizers, $encoders);

        $f = 'tests/Data/samples/fact1.xml';
        $xmlstring = file_get_contents($f);

        $invoice = $serializer->deserialize($xmlstring, Invoice::class, 'xml',  [\Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        echo print_r($invoice).PHP_EOL;
        $this->assertInstanceOf(Invoice::class, $invoice);
        $this->assertEquals("2.1", $invoice->UBLVersionID);

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $errors = $validator->validate($invoice);

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo $error->getPropertyPath() . ': ' . $error->getMessage() . "\n";
            }
        } else {
            // echo "Validation passed!\n";
        }

        $this->assertCount(0, $errors);

        $this->assertInstanceOf(AccountingSupplierParty::class, $invoice->AccountingSupplierParty);

        $this->assertInstanceOf(Party::class, $invoice->AccountingSupplierParty->Party);

        $this->assertInstanceOf(PartyIdentification::class, $invoice->AccountingSupplierParty->Party->PartyIdentification[0]);

        $this->assertEquals(234234234, $invoice->AccountingSupplierParty->Party->PartyIdentification[0]->ID);
        // echo print_r($invoice);
    }


    public function testXSDValidation()
    {
        
        $f = 'tests/Data/samples/fact1.xml';

        libxml_use_internal_errors(true);

        $dom = new \DOMDocument();
        $dom->load($f);

        $validation = $dom->schemaValidate("src/Standards/FACT1/UBL-Invoice-2.1.xsd");
        // $validation = $dom->schemaValidateSource("src/Standards/FACT1/Validation-Invoice_v1.0.8.sch");

        $errors = libxml_get_errors();

        echo print_r($errors);

        $this->assertTrue($validation);
    }

//     public function testSchemaTronValidation()
//     {
        
// $f = 'tests/Data/samples/fact1.xml';

// $schematron = new Schematron();
// $schematron->load('src/Standards/FACT1/Validation-Invoice_v1.0.8.sch');

// $document = new \DOMDocument();
// $document->load($f);
// $result = $schematron->validate($document);

// echo print_r($result, 1);

//     }
}