<?php

namespace InvoiceNinja\EInvoice\Models\Normalizers;

use DateTimeInterface;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/** Strict calendar-date parsing for properties that opt in through their context. */
final class DateDenormalizer implements DenormalizerInterface
{
    public const STRICT_DATE = 'strict_date';

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ($context[self::STRICT_DATE] ?? false) && is_a($type, DateTimeInterface::class, true);
    }

    public function getSupportedTypes(?string $format): array
    {
        return [DateTimeInterface::class => false];
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): DateTimeInterface
    {
        $date = false;

        if (is_string($data)) {
            try {
                $date = $type::createFromFormat('!Y-m-d', $data);
            } catch (\ValueError) {
                $date = false;
            }
        }

        if ($date === false || $date->format('Y-m-d') !== $data) {
            throw NotNormalizableValueException::createForUnexpectedDataType(
                'Enter a valid date in YYYY-MM-DD format.',
                $data,
                ['string'],
                $context['deserialization_path'] ?? null,
                true
            );
        }

        return $date;
    }
}
