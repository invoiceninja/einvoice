<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\CertificateType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CertificateTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\IssuerParty;
use InvoiceNinja\EInvoice\Models\Peppol\SignatureType\Signature;
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
