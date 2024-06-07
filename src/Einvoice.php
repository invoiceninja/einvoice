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

namespace Invoiceninja\Einvoice;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Serializer\Serializer;
use Invoiceninja\Einvoice\Models\Peppol\Invoice;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronica;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;

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
     * Decodes a document in an object
     *
     * @param  string $standard Peppol / FatturaPA / FACT1
     * @param  string $document The document string
     * @param ?string $format The document encoding - xml,json
     * @return mixed
     */
    public function decode(string $standard, string $document, string $format = 'json')
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

        $encoders = [new JsonEncoder()];

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->deserialize($document, $this->parent_object, $format, [\Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        // do i need this?
        // $fattura = $normalizer->normalize($xmlstring, 'xml', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

    }

    /**
     * Encodes a document into
     * and output format such as XML / JSON
     *
     * @param  mixed $object
     * @param  string $output 'json', 'xml'
     * @return string
     */
    public function encode(mixed $object, string $output): string
    {

        $phpDocExtractor = new PhpDocExtractor();
        $reflectionExtractor = new ReflectionExtractor();

        // list of PropertyTypeExtractorInterface (any iterable)
        $typeExtractors = [$reflectionExtractor,$phpDocExtractor];

        // list of PropertyDescriptionExtractorInterface (any iterable)
        $descriptionExtractors = [$phpDocExtractor];

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

        $normalizer = new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, $propertyInfo);

        $normalizers = [  new DateTimeNormalizer(), $normalizer,  new ArrayDenormalizer() , ];
        $encoders = [$encoder, new JsonEncoder()];

        $serializer = new Serializer($normalizers, $encoders);

        $data = $serializer->encode($object, $output, $context);

        return $output == 'xml' ? $this->decorateXml($data) : $data;

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
}
