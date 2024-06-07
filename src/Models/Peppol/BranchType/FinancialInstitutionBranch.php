<?php

namespace Invoiceninja\Einvoice\Models\Peppol\BranchType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AddressType\Address;
use Invoiceninja\Einvoice\Models\Peppol\FinancialInstitutionType\FinancialInstitution;
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

class FinancialInstitutionBranch
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var string */
    #[SerializedName('cbc:Name')]
    public string $Name;

    /** @var FinancialInstitution */
    #[SerializedName('cac:FinancialInstitution')]
    public $FinancialInstitution;

    /** @var Address */
    #[SerializedName('cac:Address')]
    public $Address;
}
