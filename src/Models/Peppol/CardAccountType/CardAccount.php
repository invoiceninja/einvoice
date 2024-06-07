<?php

namespace Invoiceninja\Einvoice\Models\Peppol\CardAccountType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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

class CardAccount
{
    /** @var string */
    #[SerializedName('cbc:PrimaryAccountNumberID')]
    public string $PrimaryAccountNumberID;

    /** @var string */
    #[SerializedName('cbc:NetworkID')]
    public string $NetworkID;

    /** @var string */
    #[SerializedName('cbc:CardTypeCode')]
    public string $CardTypeCode;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:ValidityStartDate')]
    public DateTime $ValidityStartDate;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:ExpiryDate')]
    public DateTime $ExpiryDate;

    /** @var string */
    #[SerializedName('cbc:IssuerID')]
    public string $IssuerID;

    /** @var string */
    #[SerializedName('cbc:IssueNumberID')]
    public string $IssueNumberID;

    /** @var string */
    #[SerializedName('cbc:CV2ID')]
    public string $CV2ID;

    /** @var string */
    #[SerializedName('cbc:CardChipCode')]
    public string $CardChipCode;

    /** @var string */
    #[SerializedName('cbc:ChipApplicationID')]
    public string $ChipApplicationID;

    /** @var string */
    #[SerializedName('cbc:HolderName')]
    public string $HolderName;
}
