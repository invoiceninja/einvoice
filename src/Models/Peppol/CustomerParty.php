<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\ContactType\AccountingContact;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\BuyerContact;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\DeliveryContact;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\Party;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class CustomerParty
{
	/** @var string */
	#[SerializedName('cbc:CustomerAssignedAccountID')]
	public string $CustomerAssignedAccountID;

	/** @var string */
	#[SerializedName('cbc:SupplierAssignedAccountID')]
	public string $SupplierAssignedAccountID;

	/** @var string */
	#[SerializedName('cbc:AdditionalAccountID')]
	public string $AdditionalAccountID;

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
