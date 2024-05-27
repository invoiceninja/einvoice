<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PaymentTermsType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\Amount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\PenaltyAmount;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\SettlementDiscountAmount;
use Invoiceninja\Einvoice\Models\FACT1\ExchangeRateType\ExchangeRate;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\PenaltyPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\SettlementPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
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

class DisbursementPaymentTerms
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:PaymentMeansID')]
	public string $PaymentMeansID;

	/** @var string */
	#[SerializedName('cbc:PrepaidPaymentReferenceID')]
	public string $PrepaidPaymentReferenceID;

	/** @var string */
	#[Length(min: null, max: 300)]
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var string */
	#[SerializedName('cbc:ReferenceEventCode')]
	public string $ReferenceEventCode;

	/** @var string */
	#[SerializedName('cbc:SettlementDiscountPercent')]
	public string $SettlementDiscountPercent;

	/** @var string */
	#[SerializedName('cbc:PenaltySurchargePercent')]
	public string $PenaltySurchargePercent;

	/** @var string */
	#[SerializedName('cbc:PaymentPercent')]
	public string $PaymentPercent;

	/** @var Amount */
	#[SerializedName('cbc:Amount')]
	public $Amount;

	/** @var SettlementDiscountAmount */
	#[SerializedName('cbc:SettlementDiscountAmount')]
	public $SettlementDiscountAmount;

	/** @var PenaltyAmount */
	#[SerializedName('cbc:PenaltyAmount')]
	public $PenaltyAmount;

	/** @var string */
	#[SerializedName('cbc:PaymentTermsDetailsURI')]
	public string $PaymentTermsDetailsURI;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:PaymentDueDate')]
	public DateTime $PaymentDueDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:InstallmentDueDate')]
	public DateTime $InstallmentDueDate;

	/** @var string */
	#[SerializedName('cbc:InvoicingPartyReference')]
	public string $InvoicingPartyReference;

	/** @var SettlementPeriod */
	#[SerializedName('cac:SettlementPeriod')]
	public $SettlementPeriod;

	/** @var PenaltyPeriod */
	#[SerializedName('cac:PenaltyPeriod')]
	public $PenaltyPeriod;

	/** @var ExchangeRate */
	#[SerializedName('cac:ExchangeRate')]
	public $ExchangeRate;

	/** @var ValidityPeriod */
	#[SerializedName('cac:ValidityPeriod')]
	public $ValidityPeriod;
}
