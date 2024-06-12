<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\TransportEquipmentSealType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\SealIssuerTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\SealStatusCode;
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

class TransportEquipmentSeal
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var SealIssuerTypeCode */
	#[SerializedName('cbc:SealIssuerTypeCode')]
	public $SealIssuerTypeCode;

	/** @var string */
	#[SerializedName('cbc:Condition')]
	public string $Condition;

	/** @var SealStatusCode */
	#[SerializedName('cbc:SealStatusCode')]
	public $SealStatusCode;

	/** @var string */
	#[SerializedName('cbc:SealingPartyType')]
	public string $SealingPartyType;
}
