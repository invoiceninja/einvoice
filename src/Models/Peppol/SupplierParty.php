<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\ContactType\AccountingContact;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\DespatchContact;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\SellerContact;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\AdditionalAccountID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\CustomerAssignedAccountID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\Party;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

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
