<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\PartyTaxSchemeType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\RegistrationAddress;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ExemptionReasonCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TaxLevelCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\CompanyID;
use InvoiceNinja\EInvoice\Models\Peppol\TaxSchemeType\TaxScheme;
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

class PartyTaxScheme
{
	/** @var string */
	#[SerializedName('cbc:RegistrationName')]
	public string $RegistrationName;

	/** @var CompanyID */
	#[SerializedName('cbc:CompanyID')]
	public $CompanyID;

	/** @var TaxLevelCode */
	#[SerializedName('cbc:TaxLevelCode')]
	public $TaxLevelCode;

	/** @var ExemptionReasonCode */
	#[SerializedName('cbc:ExemptionReasonCode')]
	public $ExemptionReasonCode;

	/** @var string */
	#[SerializedName('cbc:ExemptionReason')]
	public string $ExemptionReason;

	/** @var RegistrationAddress */
	#[SerializedName('cac:RegistrationAddress')]
	public $RegistrationAddress;

	/** @var TaxScheme */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cac:TaxScheme')]
	public $TaxScheme;
}
