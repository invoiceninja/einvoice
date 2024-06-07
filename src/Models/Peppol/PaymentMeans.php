<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Peppol\CardAccountType\CardAccount;
use Invoiceninja\Einvoice\Models\Peppol\CreditAccountType\CreditAccount;
use Invoiceninja\Einvoice\Models\Peppol\FinancialAccountType\PayeeFinancialAccount;
use Invoiceninja\Einvoice\Models\Peppol\FinancialAccountType\PayerFinancialAccount;
use Invoiceninja\Einvoice\Models\Peppol\PaymentMandateType\PaymentMandate;
use Invoiceninja\Einvoice\Models\Peppol\TradeFinancingType\TradeFinancing;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class PaymentMeans
{
    /** @var string */
    #[SerializedName('cbc:ID')]
    public string $ID;

    /** @var string */
    #[SerializedName('cbc:PaymentMeansCode')]
    public string $PaymentMeansCode;

    /** @var DateTime */
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
    #[SerializedName('cbc:PaymentDueDate')]
    public \DateTime $PaymentDueDate;

    /** @var string */
    #[SerializedName('cbc:PaymentChannelCode')]
    public string $PaymentChannelCode;

    /** @var string */
    #[SerializedName('cbc:InstructionID')]
    public string $InstructionID;

    /** @var string */
    #[SerializedName('cbc:InstructionNote')]
    public string $InstructionNote;

    /** @var string */
    #[SerializedName('cbc:PaymentID')]
    public string $PaymentID;

    /** @var CardAccount */
    #[SerializedName('cac:CardAccount')]
    public $CardAccount;

    /** @var PayerFinancialAccount */
    #[SerializedName('cac:PayerFinancialAccount')]
    public $PayerFinancialAccount;

    /** @var PayeeFinancialAccount */
    #[SerializedName('cac:PayeeFinancialAccount')]
    public $PayeeFinancialAccount;

    /** @var CreditAccount */
    #[SerializedName('cac:CreditAccount')]
    public $CreditAccount;

    /** @var PaymentMandate */
    #[SerializedName('cac:PaymentMandate')]
    public $PaymentMandate;

    /** @var TradeFinancing */
    #[SerializedName('cac:TradeFinancing')]
    public $TradeFinancing;
}
