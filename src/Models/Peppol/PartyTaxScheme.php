<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Peppol\AddressType\RegistrationAddress;
use Invoiceninja\Einvoice\Models\Peppol\TaxSchemeType\TaxScheme;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class PartyTaxScheme
{
	/** @var string */
	#[SerializedName('cbc:RegistrationName')]
	public string $RegistrationName;

	/** @var string */
	#[SerializedName('cbc:CompanyID')]
	public string $CompanyID;

	/** @var string */
	#[SerializedName('cbc:TaxLevelCode')]
	public string $TaxLevelCode;

	/** @var string */
	#[SerializedName('cbc:ExemptionReasonCode')]
	public string $ExemptionReasonCode;

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
