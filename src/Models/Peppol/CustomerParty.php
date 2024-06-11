<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\AdditionalAccountIDType\AdditionalAccountID;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\AccountingContact;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\BuyerContact;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\DeliveryContact;
use InvoiceNinja\EInvoice\Models\Peppol\CustomerAssignedAccountIDType\CustomerAssignedAccountID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\Party;
use InvoiceNinja\EInvoice\Models\Peppol\SupplierAssignedAccountIDType\SupplierAssignedAccountID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class CustomerParty
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
