<?php

namespace InvoiceNinja\EInvoice\Models\Normalizers;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/** Accept JSON identifier shorthand and store integer identifier values as strings. */
final class IdentifierDenormalizer implements DenormalizerInterface
{
    public function __construct(private DenormalizerInterface $object_normalizer)
    {
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $format !== 'xml'
            && (is_string($data) || is_int($data) || is_array($data))
            && str_starts_with($type, 'InvoiceNinja\\EInvoice\\Models\\Peppol\\IdentifierType\\')
            && class_exists($type);
    }

    public function getSupportedTypes(?string $format): array
    {
        return $format === 'xml' ? [] : ['object' => false];
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $data = $this->stringify($data);

        if (is_string($data)) {
            $data = ['value' => $data];
        }

        return $this->object_normalizer->denormalize($data, $type, $format, $context);
    }

    private function stringify(mixed $data): mixed
    {
        if (is_int($data)) {
            return (string) $data;
        }

        if (!is_array($data)) {
            return $data;
        }

        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $data[$key] = (string) $value;
            }
        }

        return $data;
    }
}
