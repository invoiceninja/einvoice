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

namespace InvoiceNinja\EInvoice;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Serializer\Serializer;
use InvoiceNinja\EInvoice\Models\Peppol\Invoice;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use InvoiceNinja\EInvoice\Models\FatturaPA\FatturaElettronica;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;

class EInvoice
{
    private mixed $parent_object;

    public function __construct()
    {
    }
    
    /**
     * Validates an object
     *
     * @param  mixed $object
     * @return array
     */
    public function validate(mixed $object): array
    {
        $serializer = $this->getSerializer();

        $object = $serializer->normalize($object);

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $errors = $validator->validate($object);

        $bag = [];

        foreach ($errors as $error) {
            $bag[$error->getPropertyPath()] = $error->getMessage();
        }

        return $bag;

    }
    
    /**
     * Validate Request
     *
     * @param  array $payload
     * @param  string $class
     * @return array
     */
    public function validateRequest(array $payload, string $class): array
    {
        
        $payload = $this->denormalize($payload, $class);

        // $payload = $serializer->deserialize(json_encode($payload), $class, 'json');

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $errors = $validator->validate($payload);

        $bag = [];

        foreach ($errors as $error) {
            $bag[$error->getPropertyPath()] = $error->getMessage();
        }

        return $bag;

    }

    public function denormalize(array $payload, string $class): mixed
    {

        $serializer = $this->getSerializer();

        // Blank string is converted to null, which then makes the "string" type invalid - even for an optional property.
        // by denormalizing, we avoid this scenario, as the prop is dropped, but the validator will still enforce if required!
        // ie, we need this to get an object - of some form - into the validator!!!!
        $payload = $serializer->denormalize(json_encode($payload), $class, null, [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        return  $payload;
        

    }

    /**
     * Decodes a document into an object
     *
     * @param  string $standard Peppol / FatturaPA / FACT1
     * @param  string $document The document string
     * @param ?string $format The document encoding ie xml,json
     * @return mixed
     */
    public function decode(string $standard, string $document, ?string $format = 'json')
    {
        $this->resolveStandard($standard);

        $phpDocExtractor = new PhpDocExtractor();
        $reflectionExtractor = new ReflectionExtractor();

        // list of PropertyTypeExtractorInterface (any iterable)
        $typeExtractors = [$reflectionExtractor,$phpDocExtractor];

        // list of PropertyDescriptionExtractorInterface (any iterable)
        $descriptionExtractors = [$phpDocExtractor];

        // list of PropertyInitializableExtractorInterface (any iterable)
        $propertyInitializableExtractors = [$reflectionExtractor];

        $propertyInfo = new PropertyInfoExtractor(
            $propertyInitializableExtractors,
            $descriptionExtractors,
            $typeExtractors,
        );

        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());

        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $normalizer = new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, $propertyInfo);

        $normalizers = [new DateTimeNormalizer(), $normalizer,  new ArrayDenormalizer()];

        $encoders = [new XmlEncoder(['xml_format_output' => true,\Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer::SKIP_NULL_VALUES => true]), new JsonEncoder()];

        $serializer = new Serializer($normalizers, $encoders);

        // $document = $serializer->normalize($document, $format, [\Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $invoice = $serializer->deserialize($document, $this->parent_object, $format, [\Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
        
        return $invoice;
        // do i need this?
        // $invoice = $normalizer->normalize($invoice, $format, [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
        // return $invoice;

    }

    /**
     * Encodes a document into
     * and output format such as XML / JSON
     *
     * @param  mixed $object
     * @param  string $type 'json', 'xml'
     * @return string
     */
    public function encode(mixed $object, string $type): string
    {

        $serializer = $this->getSerializer();

        $context = [DateTimeNormalizer::FORMAT_KEY => 'Y-m-d', AbstractObjectNormalizer::SKIP_NULL_VALUES => true];

        $object = $serializer->normalize($object, null, [\Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $data = $serializer->encode($object, $type, $context);

        return $type == 'xml' ? $this->decorateXml($data) : $data;

    }

    /**
     * DecorateXml
     *
     * Removes unnecessary tags.
     *
     * Also to be used to decorate based on the required standard
     *
     * @param  string $data
     * @return string
     */
    private function decorateXml(string $data): string
    {

        $data = str_replace(['<response>','</response>'], '', $data);
        $data = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $data);

        return $data;

    }

    /**
     * Resolve Standard
     *
     * Sets class variables;
     *
     * @param  string $standard
     * @return self
     */
    private function resolveStandard(string $standard): self
    {
        match ($standard) {
            'Peppol' => $this->parent_object = Invoice::class,
            'FatturaPA' => $this->parent_object = FatturaElettronica::class,
            'FACT1' => $this->parent_object = Invoice::class,
            default => $this->parent_object = Invoice::class,
        };

        return $this;
    }

    private function getSerializer(): Serializer
    {
                
        $phpDocExtractor = new PhpDocExtractor();
        $reflectionExtractor = new ReflectionExtractor();
        // list of PropertyListExtractorInterface (any iterable)
        $typeExtractors = [$reflectionExtractor,$phpDocExtractor];
        // list of PropertyDescriptionExtractorInterface (any iterable)
        $descriptionExtractors = [$phpDocExtractor];
        // list of PropertyAccessExtractorInterface (any iterable)
        $propertyInitializableExtractors = [$reflectionExtractor];
        $propertyInfo = new PropertyInfoExtractor(
            $propertyInitializableExtractors,
            $descriptionExtractors,
            $typeExtractors,
        );
        $xml_encoder = new XmlEncoder(['xml_format_output' => true, 'remove_empty_tags' => true,]);
        $json_encoder = new JsonEncoder();

        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $normalizer = new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, $propertyInfo);

        $normalizers = [new DateTimeNormalizer(), $normalizer,  new ArrayDenormalizer() , ];
        $encoders = [$xml_encoder, $json_encoder];
        $serializer = new Serializer($normalizers, $encoders);

        return $serializer;
    }
}
