<?php

namespace InvoiceNinja\EInvoice\Models\Normalizers;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/** Accept JSON identifier shorthand without changing wrapped or XML representations. */
final class IdentifierDenormalizer implements DenormalizerInterface
{
    public function __construct(private DenormalizerInterface $object_normalizer)
    {
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $format !== 'xml'
            && (is_string($data) || is_int($data))
            && str_starts_with($type, 'InvoiceNinja\\EInvoice\\Models\\Peppol\\IdentifierType\\')
            && class_exists($type);
    }

    public function getSupportedTypes(?string $format): array
    {
        return $format === 'xml' ? [] : ['object' => false];
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return $this->object_normalizer->denormalize(['value' => $data], $type, $format, $context);
    }
}
