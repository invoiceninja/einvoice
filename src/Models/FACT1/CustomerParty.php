<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\ContactType\AccountingContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\BuyerContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\DeliveryContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;

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
