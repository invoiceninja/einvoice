<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\AddressType\LocationAddress;
use Invoiceninja\Einvoice\Models\FACT1\LineReferenceType\DependentLineReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;

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
