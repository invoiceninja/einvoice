<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\AllowanceChargeType\AllowanceCharge;
use Invoiceninja\Einvoice\Models\FACT1\AmountType\Amount;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class BillingReferenceLine
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var Amount */
	#[SerializedName('cbc:Amount')]
	public $Amount;

	/** @var AllowanceCharge[] */
	#[SerializedName('cac:AllowanceCharge')]
	public array $AllowanceCharge = [];
}
