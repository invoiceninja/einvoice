<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\AddressType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressFormatCodeType\AddressFormatCode;
use InvoiceNinja\EInvoice\Models\Peppol\AddressLineType\AddressLine;
use InvoiceNinja\EInvoice\Models\Peppol\AddressTypeCodeType\AddressTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\CountrySubentityCodeType\CountrySubentityCode;
use InvoiceNinja\EInvoice\Models\Peppol\CountryType\Country;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\LocationCoordinateType\LocationCoordinate;
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

class ResidenceAddress
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var AddressTypeCode */
	#[SerializedName('cbc:AddressTypeCode')]
	public $AddressTypeCode;

	/** @var AddressFormatCode */
	#[SerializedName('cbc:AddressFormatCode')]
	public $AddressFormatCode;

	/** @var string */
	#[SerializedName('cbc:Postbox')]
	public string $Postbox;

	/** @var string */
	#[SerializedName('cbc:Floor')]
	public string $Floor;

	/** @var string */
	#[SerializedName('cbc:Room')]
	public string $Room;

	/** @var string */
	#[SerializedName('cbc:StreetName')]
	public string $StreetName;

	/** @var string */
	#[SerializedName('cbc:AdditionalStreetName')]
	public string $AdditionalStreetName;

	/** @var string */
	#[SerializedName('cbc:BlockName')]
	public string $BlockName;

	/** @var string */
	#[SerializedName('cbc:BuildingName')]
	public string $BuildingName;

	/** @var string */
	#[SerializedName('cbc:BuildingNumber')]
	public string $BuildingNumber;

	/** @var string */
	#[SerializedName('cbc:InhouseMail')]
	public string $InhouseMail;

	/** @var string */
	#[SerializedName('cbc:Department')]
	public string $Department;

	/** @var string */
	#[SerializedName('cbc:MarkAttention')]
	public string $MarkAttention;

	/** @var string */
	#[SerializedName('cbc:MarkCare')]
	public string $MarkCare;

	/** @var string */
	#[SerializedName('cbc:PlotIdentification')]
	public string $PlotIdentification;

	/** @var string */
	#[SerializedName('cbc:CitySubdivisionName')]
	public string $CitySubdivisionName;

	/** @var string */
	#[SerializedName('cbc:CityName')]
	public string $CityName;

	/** @var string */
	#[SerializedName('cbc:PostalZone')]
	public string $PostalZone;

	/** @var string */
	#[SerializedName('cbc:CountrySubentity')]
	public string $CountrySubentity;

	/** @var CountrySubentityCode */
	#[SerializedName('cbc:CountrySubentityCode')]
	public $CountrySubentityCode;

	/** @var string */
	#[SerializedName('cbc:Region')]
	public string $Region;

	/** @var string */
	#[SerializedName('cbc:District')]
	public string $District;

	/** @var string */
	#[SerializedName('cbc:TimezoneOffset')]
	public string $TimezoneOffset;

	/** @var AddressLine[] */
	#[SerializedName('cac:AddressLine')]
	public array $AddressLine;

	/** @var Country */
	#[SerializedName('cac:Country')]
	public $Country;

	/** @var LocationCoordinate[] */
	#[SerializedName('cac:LocationCoordinate')]
	public array $LocationCoordinate;
}
