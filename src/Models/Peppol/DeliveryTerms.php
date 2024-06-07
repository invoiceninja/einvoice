<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\AllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\Amount;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\DeliveryLocation;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class DeliveryTerms
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:SpecialTerms')]
	public string $SpecialTerms;

	/** @var string */
	#[SerializedName('cbc:LossRiskResponsibilityCode')]
	public string $LossRiskResponsibilityCode;

	/** @var string */
	#[SerializedName('cbc:LossRisk')]
	public string $LossRisk;

	/** @var Amount */
	#[SerializedName('cbc:Amount')]
	public $Amount;

	/** @var DeliveryLocation */
	#[SerializedName('cac:DeliveryLocation')]
	public $DeliveryLocation;

	/** @var AllowanceCharge */
	#[SerializedName('cac:AllowanceCharge')]
	public $AllowanceCharge;
}
