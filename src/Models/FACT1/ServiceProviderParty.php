<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\ContactType\SellerContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class ServiceProviderParty
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:ServiceTypeCode')]
	public string $ServiceTypeCode;

	/** @var string */
	#[SerializedName('cbc:ServiceType')]
	public string $ServiceType;

	/** @var Party */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cac:Party')]
	public $Party;

	/** @var SellerContact */
	#[SerializedName('cac:SellerContact')]
	public $SellerContact;
}
