<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\Amount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\PenaltyAmount;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\SettlementDiscountAmount;
use InvoiceNinja\EInvoice\Models\Peppol\ExchangeRateType\ExchangeRate;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentMeansIDType\PaymentMeansID;
use InvoiceNinja\EInvoice\Models\Peppol\PaymentTermsDetailsURIType\PaymentTermsDetailsURI;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\PenaltyPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\SettlementPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\ValidityPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PrepaidPaymentReferenceIDType\PrepaidPaymentReferenceID;
use InvoiceNinja\EInvoice\Models\Peppol\ReferenceEventCodeType\ReferenceEventCode;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class PaymentTerms
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var PaymentMeansID[] */
	#[SerializedName('cbc:PaymentMeansID')]
	public array $PaymentMeansID;

	/** @var PrepaidPaymentReferenceID */
	#[SerializedName('cbc:PrepaidPaymentReferenceID')]
	public $PrepaidPaymentReferenceID;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var ReferenceEventCode */
	#[SerializedName('cbc:ReferenceEventCode')]
	public $ReferenceEventCode;

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

	/** @var PaymentTermsDetailsURI */
	#[SerializedName('cbc:PaymentTermsDetailsURI')]
	public $PaymentTermsDetailsURI;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:PaymentDueDate')]
	public DateTime $PaymentDueDate;

	/** @var \DateTime */
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
