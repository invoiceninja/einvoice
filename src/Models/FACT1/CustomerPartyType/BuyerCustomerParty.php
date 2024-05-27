<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\CustomerPartyType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\AccountingContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\BuyerContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\DeliveryContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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
