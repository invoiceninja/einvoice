<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\CertificateTypeCodeType\CertificateTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\IssuerParty;
use InvoiceNinja\EInvoice\Models\Peppol\SignatureType\Signature;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Certificate
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var CertificateTypeCode */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:CertificateTypeCode')]
	public $CertificateTypeCode;

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
