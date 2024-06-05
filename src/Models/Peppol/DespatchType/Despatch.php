<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\DespatchType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\AddressType\DespatchAddress;
use Invoiceninja\Einvoice\Models\Peppol\ContactType\Contact;
use Invoiceninja\Einvoice\Models\Peppol\LocationType\DespatchLocation;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\CarrierParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\DespatchParty;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\NotifyParty;
use Invoiceninja\Einvoice\Models\Peppol\PeriodType\EstimatedDespatchPeriod;
use Invoiceninja\Einvoice\Models\Peppol\PeriodType\RequestedDespatchPeriod;
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
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

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

	/** @var string */
	#[SerializedName('cbc:ReleaseID')]
	public string $ReleaseID;

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
