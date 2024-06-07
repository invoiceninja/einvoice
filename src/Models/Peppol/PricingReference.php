<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\ItemLocationQuantityType\OriginalItemLocationQuantity;
use InvoiceNinja\EInvoice\Models\Peppol\PriceType\AlternativeConditionPrice;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class PricingReference
{
	/** @var OriginalItemLocationQuantity */
	#[SerializedName('cac:OriginalItemLocationQuantity')]
	public $OriginalItemLocationQuantity;

	/** @var AlternativeConditionPrice[] */
	#[SerializedName('cac:AlternativeConditionPrice')]
	public array $AlternativeConditionPrice;
}
