<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\DespatchType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\DespatchAddress;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\Contact;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ReleaseID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\DespatchLocation;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\CarrierParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\DespatchParty;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\NotifyParty;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\EstimatedDespatchPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\RequestedDespatchPeriod;
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

class Despatch
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:RequestedDespatchDate')]
	public DateTime $RequestedDespatchDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:RequestedDespatchTime')]
	public DateTime $RequestedDespatchTime;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:EstimatedDespatchDate')]
	public DateTime $EstimatedDespatchDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:EstimatedDespatchTime')]
	public DateTime $EstimatedDespatchTime;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ActualDespatchDate')]
	public DateTime $ActualDespatchDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ActualDespatchTime')]
	public DateTime $ActualDespatchTime;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:GuaranteedDespatchDate')]
	public DateTime $GuaranteedDespatchDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:GuaranteedDespatchTime')]
	public DateTime $GuaranteedDespatchTime;

	/** @var ReleaseID */
	#[SerializedName('cbc:ReleaseID')]
	public $ReleaseID;

	/** @var string */
	#[SerializedName('cbc:Instructions')]
	public string $Instructions;

	/** @var DespatchAddress */
	#[SerializedName('cac:DespatchAddress')]
	public $DespatchAddress;

	/** @var DespatchLocation */
	#[SerializedName('cac:DespatchLocation')]
	public $DespatchLocation;

	/** @var DespatchParty */
	#[SerializedName('cac:DespatchParty')]
	public $DespatchParty;

	/** @var CarrierParty */
	#[SerializedName('cac:CarrierParty')]
	public $CarrierParty;

	/** @var NotifyParty[] */
	#[SerializedName('cac:NotifyParty')]
	public array $NotifyParty;

	/** @var Contact */
	#[SerializedName('cac:Contact')]
	public $Contact;

	/** @var EstimatedDespatchPeriod */
	#[SerializedName('cac:EstimatedDespatchPeriod')]
	public $EstimatedDespatchPeriod;

	/** @var RequestedDespatchPeriod */
	#[SerializedName('cac:RequestedDespatchPeriod')]
	public $RequestedDespatchPeriod;
}
