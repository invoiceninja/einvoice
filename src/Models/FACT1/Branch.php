<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\AddressType\Address;
use Invoiceninja\Einvoice\Models\FACT1\FinancialInstitutionType\FinancialInstitution;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;

class Branch
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var FinancialInstitution */
	#[SerializedName('cac:FinancialInstitution')]
	public $FinancialInstitution;

	/** @var Address */
	#[SerializedName('cac:Address')]
	public $Address;
}
