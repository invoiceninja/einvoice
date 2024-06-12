<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\MeasurementDimension;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\BarcodeSymbologyID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ExtendedID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\IssuerParty;
use InvoiceNinja\EInvoice\Models\Peppol\PhysicalAttributeType\PhysicalAttribute;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class ItemIdentification
{
	/** @var ID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var ExtendedID */
	#[SerializedName('cbc:ExtendedID')]
	public $ExtendedID;

	/** @var BarcodeSymbologyID */
	#[SerializedName('cbc:BarcodeSymbologyID')]
	public $BarcodeSymbologyID;

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
