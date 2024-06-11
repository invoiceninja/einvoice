<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\Address;
use InvoiceNinja\EInvoice\Models\Peppol\CountrySubentityCodeType\CountrySubentityCode;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\InformationURIType\InformationURI;
use InvoiceNinja\EInvoice\Models\Peppol\LocationCoordinateType\LocationCoordinate;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\SubsidiaryLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LocationTypeCodeType\LocationTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\ValidityPeriod;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class Location
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var string */
	#[SerializedName('cbc:Conditions')]
	public string $Conditions;

	/** @var string */
	#[SerializedName('cbc:CountrySubentity')]
	public string $CountrySubentity;

	/** @var CountrySubentityCode */
	#[SerializedName('cbc:CountrySubentityCode')]
	public $CountrySubentityCode;

	/** @var LocationTypeCode */
	#[SerializedName('cbc:LocationTypeCode')]
	public $LocationTypeCode;

	/** @var InformationURI */
	#[SerializedName('cbc:InformationURI')]
	public $InformationURI;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var ValidityPeriod[] */
	#[SerializedName('cac:ValidityPeriod')]
	public array $ValidityPeriod;

	/** @var Address */
	#[SerializedName('cac:Address')]
	public $Address;

	/** @var SubsidiaryLocation[] */
	#[SerializedName('cac:SubsidiaryLocation')]
	public array $SubsidiaryLocation;

	/** @var LocationCoordinate[] */
	#[SerializedName('cac:LocationCoordinate')]
	public array $LocationCoordinate;
}
