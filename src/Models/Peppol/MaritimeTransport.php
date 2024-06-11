<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\RegistryCertificateDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\RegistryPortLocation;
use InvoiceNinja\EInvoice\Models\Peppol\RadioCallSignIDType\RadioCallSignID;
use InvoiceNinja\EInvoice\Models\Peppol\VesselIDType\VesselID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class MaritimeTransport
{
	/** @var VesselID */
	#[SerializedName('cbc:VesselID')]
	public $VesselID;

	/** @var string */
	#[SerializedName('cbc:VesselName')]
	public string $VesselName;

	/** @var RadioCallSignID */
	#[SerializedName('cbc:RadioCallSignID')]
	public $RadioCallSignID;

	/** @var string */
	#[SerializedName('cbc:ShipsRequirements')]
	public string $ShipsRequirements;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:GrossTonnageMeasure')]
	public string $GrossTonnageMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:NetTonnageMeasure')]
	public string $NetTonnageMeasure;

	/** @var RegistryCertificateDocumentReference */
	#[SerializedName('cac:RegistryCertificateDocumentReference')]
	public $RegistryCertificateDocumentReference;

	/** @var RegistryPortLocation */
	#[SerializedName('cac:RegistryPortLocation')]
	public $RegistryPortLocation;
}
