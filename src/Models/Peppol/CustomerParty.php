<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use Invoiceninja\Einvoice\Models\Peppol\ContactType\AccountingContact;
use Invoiceninja\Einvoice\Models\Peppol\ContactType\BuyerContact;
use Invoiceninja\Einvoice\Models\Peppol\ContactType\DeliveryContact;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\Party;
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
