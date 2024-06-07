<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AmountType\PaidAmount;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class Payment
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var PaidAmount */
    #[SerializedName('cbc:PaidAmount')]
    public $PaidAmount;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:ReceivedDate')]
    public DateTime $ReceivedDate;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:PaidDate')]
    public DateTime $PaidDate;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
    #[SerializedName('cbc:PaidTime')]
    public DateTime $PaidTime;

    /** @var string */
    #[SerializedName('cbc:InstructionID')]
    public string $InstructionID;
}
