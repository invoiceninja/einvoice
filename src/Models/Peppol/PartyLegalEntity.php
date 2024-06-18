<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\RegistrationAddress;
use InvoiceNinja\EInvoice\Models\Peppol\AmountType\CorporateStockAmount;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CompanyLegalFormCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CompanyLiquidationStatusCode;
use InvoiceNinja\EInvoice\Models\Peppol\CorporateRegistrationSchemeType\CorporateRegistrationScheme;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\CompanyID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\HeadOfficeParty;
use InvoiceNinja\EInvoice\Models\Peppol\ShareholderPartyType\ShareholderParty;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class PartyLegalEntity
{
	/** @var string */
	#[SerializedName('cbc:RegistrationName')]
	public string $RegistrationName;

	/** @var CompanyID */
	#[SerializedName('cbc:CompanyID')]
	public $CompanyID;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:RegistrationDate')]
	public ?\DateTime $RegistrationDate;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:RegistrationExpirationDate')]
	public ?\DateTime $RegistrationExpirationDate;

	/** @var CompanyLegalFormCode */
	#[SerializedName('cbc:CompanyLegalFormCode')]
	public $CompanyLegalFormCode;

	/** @var string */
	#[SerializedName('cbc:CompanyLegalForm')]
	public string $CompanyLegalForm;

	/** @var bool */
	#[SerializedName('cbc:SoleProprietorshipIndicator')]
	public bool $SoleProprietorshipIndicator;

	/** @var CompanyLiquidationStatusCode */
	#[SerializedName('cbc:CompanyLiquidationStatusCode')]
	public $CompanyLiquidationStatusCode;

	/** @var CorporateStockAmount */
	#[SerializedName('cbc:CorporateStockAmount')]
	public $CorporateStockAmount;

	/** @var bool */
	#[SerializedName('cbc:FullyPaidSharesIndicator')]
	public bool $FullyPaidSharesIndicator;

	/** @var RegistrationAddress */
	#[SerializedName('cac:RegistrationAddress')]
	public $RegistrationAddress;

	/** @var CorporateRegistrationScheme */
	#[SerializedName('cac:CorporateRegistrationScheme')]
	public $CorporateRegistrationScheme;

	/** @var HeadOfficeParty */
	#[SerializedName('cac:HeadOfficeParty')]
	public $HeadOfficeParty;

	/** @var ShareholderParty[] */
	#[SerializedName('cac:ShareholderParty')]
	public array $ShareholderParty;
}
