<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\SealIssuerTypeCodeType\SealIssuerTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\SealStatusCodeType\SealStatusCode;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
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
