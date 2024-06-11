<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
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

	/** @var string */
	#[SerializedName('cbc:SealIssuerTypeCode')]
	public string $SealIssuerTypeCode;

	/** @var string */
	#[SerializedName('cbc:Condition')]
	public string $Condition;

	/** @var string */
	#[SerializedName('cbc:SealStatusCode')]
	public string $SealStatusCode;

	/** @var string */
	#[SerializedName('cbc:SealingPartyType')]
	public string $SealingPartyType;
}
