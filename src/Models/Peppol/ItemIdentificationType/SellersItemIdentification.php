<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ItemIdentificationType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\MeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\IssuerParty;
use InvoiceNinja\EInvoice\Models\Peppol\PhysicalAttributeType\PhysicalAttribute;
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

class SellersItemIdentification
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:ExtendedID')]
	public string $ExtendedID;

	/** @var string */
	#[SerializedName('cbc:BarcodeSymbologyID')]
	public string $BarcodeSymbologyID;

	/** @var PhysicalAttribute[] */
	#[SerializedName('cac:PhysicalAttribute')]
	public array $PhysicalAttribute;

	/** @var MeasurementDimension[] */
	#[SerializedName('cac:MeasurementDimension')]
	public array $MeasurementDimension;

	/** @var IssuerParty */
	#[SerializedName('cac:IssuerParty')]
	public $IssuerParty;
}
