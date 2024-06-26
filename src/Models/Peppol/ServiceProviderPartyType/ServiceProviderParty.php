<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ServiceProviderPartyType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ServiceTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\SellerContact;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\Party;
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

class ServiceProviderParty
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var ServiceTypeCode */
	#[SerializedName('cbc:ServiceTypeCode')]
	public $ServiceTypeCode;

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
