<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\CustomerPartyType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\AccountingContact;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\BuyerContact;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\DeliveryContact;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\AdditionalAccountID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\CustomerAssignedAccountID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\SupplierAssignedAccountID;
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

class BuyerCustomerParty
{
	/** @var CustomerAssignedAccountID */
	#[SerializedName('cbc:CustomerAssignedAccountID')]
	public $CustomerAssignedAccountID;

	/** @var SupplierAssignedAccountID */
	#[SerializedName('cbc:SupplierAssignedAccountID')]
	public $SupplierAssignedAccountID;

	/** @var AdditionalAccountID[] */
	#[SerializedName('cbc:AdditionalAccountID')]
	public array $AdditionalAccountID;

	/** @var Party */
	#[SerializedName('cac:Party')]
	public $Party;

	/** @var DeliveryContact */
	#[SerializedName('cac:DeliveryContact')]
	public $DeliveryContact;

	/** @var AccountingContact */
	#[SerializedName('cac:AccountingContact')]
	public $AccountingContact;

	/** @var BuyerContact */
	#[SerializedName('cac:BuyerContact')]
	public $BuyerContact;
}
