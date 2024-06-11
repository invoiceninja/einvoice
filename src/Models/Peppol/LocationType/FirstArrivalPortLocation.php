<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\LocationType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\Address;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\InformationURIType\InformationURI;
use InvoiceNinja\EInvoice\Models\Peppol\LocationCoordinateType\LocationCoordinate;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\ValidityPeriod;
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

class FirstArrivalPortLocation
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

	/** @var string */
	#[SerializedName('cbc:CountrySubentityCode')]
	public string $CountrySubentityCode;

	/** @var string */
	#[SerializedName('cbc:LocationTypeCode')]
	public string $LocationTypeCode;

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
