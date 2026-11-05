<?php

namespace InvoiceNinja\EInvoice\Tests\Data;

use InvoiceNinja\EInvoice\EInvoice;
use InvoiceNinja\EInvoice\Validation\PeppolValidationAssets;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Serializer\Serializer;
use InvoiceNinja\EInvoice\Models\Peppol\Invoice;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\Party;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;
use InvoiceNinja\EInvoice\Models\Peppol\SupplierPartyType\AccountingSupplierParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyIdentificationType\PartyIdentification;

class PeppolDataTest extends TestCase
{

    public function setUp(): void
    {
    }


    public function initSerializer(): Serializer
    {

        $phpDocExtractor = new PhpDocExtractor();
        $reflectionExtractor = new ReflectionExtractor();
        $typeExtractors = [$reflectionExtractor,$phpDocExtractor];
        $descriptionExtractors = [$phpDocExtractor];
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
        $normalizer = new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, $propertyInfo);
        $normalizers = [  new DateTimeNormalizer(), $normalizer,  new ArrayDenormalizer() , ];
        $encoders = [$encoder, new JsonEncoder()];
        $serializer = new Serializer($normalizers, $encoders);
        return $serializer;

    }

    public function testFactSerializer()
    {
    
        $f = 'tests/Data/samples/fact1.xml';
        $e = new EInvoice();
        $invoice = $e->decode('Peppol', file_get_contents($f), 'xml');
        
        // echo $invoice->UBLVersionID.PHP_EOL;
        // echo print_r($invoice).PHP_EOL;

        $this->assertObjectHasProperty('UBLVersionID', $invoice);
        // echo print_r($invoice->UBLVersionID,1).PHP_EOL;
        // echo print_r($invoice).PHP_EOL;
        $this->assertInstanceOf(Invoice::class, $invoice);
        // $this->assertEquals("2.1", $invoice->_UBLVersionID);

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $errors = $validator->validate($invoice);

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                // echo $error->getPropertyPath() . ': ' . $error->getMessage() . "\n";
            }
        } else {
        }

        $this->assertCount(0, $errors);

        $this->assertInstanceOf(AccountingSupplierParty::class, $invoice->AccountingSupplierParty);

        $this->assertInstanceOf(Party::class, $invoice->AccountingSupplierParty->Party);

        $this->assertInstanceOf(PartyIdentification::class, $invoice->AccountingSupplierParty->Party->PartyIdentification[0]);

        // $this->assertEquals(234234234, $invoice->AccountingSupplierParty->Party->PartyIdentification[0]->ID);
    }

    public function testDecode()
    {
        $json = '{"ID":{"value":"ROCKER"},"Note":"NOTE","PaymentMeans":[{"ID":{"value":"afdasfasdfasdfas"},"PayeeFinancialAccount":{"Name":"PFA-NAME","ID":{"value":"DE89370400440532013000"},"AliasName":"PFA-Alias","AccountTypeCode":{"value":"CHECKING"},"AccountFormatCode":{"value":"IBAN"},"CurrencyCode":{"value":"EUR"},"FinancialInstitutionBranch":{"ID":{"value":"DEUTDEMMXXX"},"Name":"Deutsche Bank"}}}]}';
    
        $e = new EInvoice();
        $result = $e->decode('Peppol', $json, 'json');

        $this->assertInstanceOf(Invoice::class, $result);
        $this->assertSame('ROCKER', $result->ID->value);
        $this->assertSame('DE89370400440532013000', $result->PaymentMeans[0]->PayeeFinancialAccount->ID->value);


    }


    // public function testClassMapper()
    // {
    // $f = file_get_contents("src/Schema/Peppol/Peppol.json");

    // $f = json_decode($f);

    // // echo print_r(json_encode($f, JSON_PRETTY_PRINT)).PHP_EOL;
    // $map = [];

    // foreach($f->InvoiceType->elements as $e) {

    //     // echo print_r($e);
    //     if($this->getPath($e->name)) {
    //         // echo $e->name.PHP_EOL;
    //         // echo $this->getPath($e->name).PHP_EOL;
    //         $map[$e->name] = $this->getPath($e->name);
    //     }
    //     if($f->{$e->base_type}) {

    //         foreach($f->{$e->base_type}->elements as $ee) {


    //             if($this->getPath($ee->name)) {
    //                 // echo " ==> " .$ee->name.PHP_EOL;
    //                 // echo $this->getPath($ee->name).PHP_EOL;
                    
    //                 $map[$ee->name] = $this->getPath($ee->name);

    //             }

    //             if($f->{$ee->base_type} ?? false) {

    //                 foreach($f->{$ee->base_type}?->elements as $eee) {

    //                     if($this->getPath($eee->name)) {
    //                         // echo " ======> " .$eee->name.PHP_EOL;
    //                         // echo $this->getPath($eee->name).PHP_EOL;
                            
    //                 $map[$eee->name] = $this->getPath($eee->name);

    //                     }
    //                     if($f->{$eee->base_type} ?? false) {

    //                         foreach($f->{$eee->base_type}?->elements as $eeee) {

    //                             if($this->getPath($eeee->name)) {
    //                                 // echo " ======> " .$eeee->name.PHP_EOL;
    //                                 // echo $this->getPath($eeee->name).PHP_EOL;
                                    
    //                 $map[$eeee->name] = $this->getPath($eeee->name);

    //                             }

    //                             if($f->{$eeee->base_type} ?? false) {

    //                                 foreach($f->{$eeee->base_type}?->elements as $eeeee) {

    //                                     if($this->getPath($eeeee->name)) {
    //                                         // echo " ======> " .$eeeee->name.PHP_EOL;
    //                                         // echo $this->getPath($eeeee->name).PHP_EOL;
                                            
    //                 $map[$eeeee->name] = $this->getPath($eeeee->name);

    //                                     }

    //                                 }

    //                             }


    //                         }

    //                     }


    //                 }

    //             }

    //         }

    //     }

    //         $this->assertIsArray($map);
    //         echo print_r($map).PHP_EOL;
    //     }
    // }

    private function getPath($string): ?string
    {
        $directoryIterator = new \RecursiveDirectoryIterator("src/Models/Peppol/", \RecursiveDirectoryIterator::SKIP_DOTS);

        foreach (new \RecursiveIteratorIterator($directoryIterator) as $file) {

            if($file->getFileName() == "{$string}.php") {
                
                $path = str_replace([".php","/","src"],["","\\",""], $file->getPathname());

                return "InvoiceNinja\EInvoice{$path}";

            }

            $file = null;

        }

        return null;
    }

    // Saxon-PHP example (requires ext-saxon): run both CEN + Peppol UBL stylesheets.
    //
    // public function testPeppolUblSchematronValidation(): void
    // {
    //     $xml = PeppolValidationAssets::absolute('src/Standards/Peppol/example.xml');
    //     $processor = new \Saxon\SaxonProcessor();
    //     $xslt = $processor->newXslt30Processor();
    //     $node = $processor->parseXmlFromFile($xml);
    //
    //     foreach (PeppolValidationAssets::ublXsltRelativePaths() as $relativeXslt) {
    //         $executable = $xslt->compileFromFile(PeppolValidationAssets::absolute($relativeXslt));
    //         $executable->transformToValue($node);
    //     }
    // }
}