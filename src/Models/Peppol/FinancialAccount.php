<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Peppol\BranchType\FinancialInstitutionBranch;
use Invoiceninja\Einvoice\Models\Peppol\CountryType\Country;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class FinancialAccount
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var string */
	#[SerializedName('cbc:AliasName')]
	public string $AliasName;

	/** @var string */
	#[SerializedName('cbc:AccountTypeCode')]
	public string $AccountTypeCode;

	/** @var string */
	#[SerializedName('cbc:AccountFormatCode')]
	public string $AccountFormatCode;

	/** @var string */
	#[SerializedName('cbc:CurrencyCode')]
	public string $CurrencyCode;

	/** @var string */
	#[SerializedName('cbc:PaymentNote')]
	public string $PaymentNote;

	/** @var FinancialInstitutionBranch */
	#[SerializedName('cac:FinancialInstitutionBranch')]
	public $FinancialInstitutionBranch;

	/** @var Country */
	#[SerializedName('cac:Country')]
	public $Country;
}
