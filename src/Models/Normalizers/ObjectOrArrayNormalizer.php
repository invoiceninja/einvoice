<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/einvoice source repository
 *
 * @copyright Copyright (c) 2024. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace Invoiceninja\Einvoice\Models\Normalizers;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

class ObjectOrArrayNormalizer implements DenormalizerInterface
{
    private $denormalizer;

    public function __construct(DenormalizerInterface $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }

    public function supportsDenormalization($data, string $type, string $format = null, array $context = []): bool
    {
        return isset($context['object_or_array']);
    }

    public function denormalize($data, string $type, string $format = null, array $context = []): mixed
    {
        if (is_array($data)) {
            if (array_key_exists(0, $data)) {
                // It's an array of objects
                return array_map(function ($item) use ($type, $format, $context) {
                    return $this->denormalizer->denormalize($item, $type, $format, $context);
                }, $data);
            } else {
                // It's a single object
                return $this->denormalizer->denormalize($data, $type, $format, $context);
            }
        }

        throw new UnexpectedValueException('Data is neither an array nor a single object.');
    }

    public function getSupportedTypes(?string $format): array
    {
        return [null];
    }

}
