<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\AddressType\LocationAddress;
use InvoiceNinja\EInvoice\Models\Peppol\LineReferenceType\DependentLineReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class DependentPriceReference
{
	/** @var string */
	#[SerializedName('cbc:Percent')]
	public string $Percent;

	/** @var LocationAddress */
	#[SerializedName('cac:LocationAddress')]
	public $LocationAddress;

	/** @var DependentLineReference */
	#[SerializedName('cac:DependentLineReference')]
	public $DependentLineReference;
}
