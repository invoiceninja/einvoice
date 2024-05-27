<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Certificate
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:CertificateTypeCode')]
	public string $CertificateTypeCode;

	/** @var string */
	#[SerializedName('cbc:CertificateType')]
	public string $CertificateType;

	/** @var string */
	#[SerializedName('cbc:Remarks')]
	public string $Remarks;

	/** @var IssuerParty */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cac:IssuerParty')]
	public $IssuerParty;

	/** @var DocumentReference[] */
	#[SerializedName('cac:DocumentReference')]
	public array $DocumentReference;

	/** @var Signature[] */
	#[SerializedName('cac:Signature')]
	public array $Signature;
}
