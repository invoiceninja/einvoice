<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\SupplierPartyType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\ContactType\AccountingContact;
use Invoiceninja\Einvoice\Models\Peppol\ContactType\DespatchContact;
use Invoiceninja\Einvoice\Models\Peppol\ContactType\SellerContact;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\Party;
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

class AccountingSupplierParty
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