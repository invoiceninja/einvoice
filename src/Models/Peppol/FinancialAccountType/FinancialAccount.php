<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\BranchType\FinancialInstitutionBranch;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\AccountFormatCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\AccountTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CurrencyCode;
use InvoiceNinja\EInvoice\Models\Peppol\CountryType\Country;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

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
