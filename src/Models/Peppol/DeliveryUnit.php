<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\BatchQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ConsumerUnitQuantity;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class DeliveryUnit
{
	/** @var BatchQuantity */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:BatchQuantity')]
	public $BatchQuantity;

	/** @var ConsumerUnitQuantity */
	#[SerializedName('cbc:ConsumerUnitQuantity')]
	public $ConsumerUnitQuantity;

	/** @var bool */
	#[SerializedName('cbc:HazardousRiskIndicator')]
	public bool $HazardousRiskIndicator;
}
