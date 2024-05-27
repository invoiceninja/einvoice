<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\ContactType\AccountingContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\DespatchContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\SellerContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;

class SupplierParty
{
	/** @var string */
	#[SerializedName('cbc:CustomerAssignedAccountID')]
	public string $CustomerAssignedAccountID;

	/** @var string */
	#[SerializedName('cbc:AdditionalAccountID')]
	public string $AdditionalAccountID;

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
