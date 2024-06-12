<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\SupplierPartyType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\AccountingContact;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\DespatchContact;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\SellerContact;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\AdditionalAccountID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\CustomerAssignedAccountID;
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

class SupplierParty
{
	/** @var CustomerAssignedAccountID */
	#[SerializedName('cbc:CustomerAssignedAccountID')]
	public $CustomerAssignedAccountID;

	/** @var AdditionalAccountID[] */
	#[SerializedName('cbc:AdditionalAccountID')]
	public array $AdditionalAccountID;

	/** @var string */
	#[SerializedName('cbc:DataSendingCapability')]
	public string $DataSendingCapability;

	/** @var Party */
	#[SerializedName('cac:Party')]
	public $Party;

	/** @var DespatchContact */
	#[SerializedName('cac:DespatchContact')]
	public $DespatchContact;

	/** @var AccountingContact */
	#[SerializedName('cac:AccountingContact')]
	public $AccountingContact;

	/** @var SellerContact */
	#[SerializedName('cac:SellerContact')]
	public $SellerContact;
}
