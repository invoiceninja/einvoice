<?php

namespace Invoiceninja\Einvoice\Models\Peppol\DependentPriceReferenceType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AddressType\LocationAddress;
use Invoiceninja\Einvoice\Models\Peppol\LineReferenceType\DependentLineReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DependentPriceReference
{
    /** @var string */
    #[SerializedName('cbc:Percent')]
    public string $Percent;

    /** @var LocationAddress */
    #[SerializedName('cac:LocationAddress')]
    public $LocationAddress;

    /** @var DependentLineReference */
    #[SerializedName('cac:DependentLineReference')]
    public $DependentLineReference;
}
