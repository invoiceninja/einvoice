<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AllowanceChargeType\AllowanceCharge;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\Amount;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\DeliveryLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LossRiskResponsibilityCodeType\LossRiskResponsibilityCode;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class DeliveryTerms
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:SpecialTerms')]
	public string $SpecialTerms;

	/** @var LossRiskResponsibilityCode */
	#[SerializedName('cbc:LossRiskResponsibilityCode')]
	public $LossRiskResponsibilityCode;

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
