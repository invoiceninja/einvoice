<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\AddressType\Address;
use InvoiceNinja\EInvoice\Models\Peppol\FinancialInstitutionType\FinancialInstitution;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class Branch
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

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
