<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\AccountFormatCodeType\AccountFormatCode;
use InvoiceNinja\EInvoice\Models\Peppol\AccountTypeCodeType\AccountTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\BranchType\FinancialInstitutionBranch;
use InvoiceNinja\EInvoice\Models\Peppol\CountryType\Country;
use InvoiceNinja\EInvoice\Models\Peppol\CurrencyCodeType\CurrencyCode;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class FinancialAccount
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var string */
	#[SerializedName('cbc:AliasName')]
	public string $AliasName;

	/** @var AccountTypeCode */
	#[SerializedName('cbc:AccountTypeCode')]
	public $AccountTypeCode;

	/** @var AccountFormatCode */
	#[SerializedName('cbc:AccountFormatCode')]
	public $AccountFormatCode;

	/** @var CurrencyCode */
	#[SerializedName('cbc:CurrencyCode')]
	public $CurrencyCode;

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
