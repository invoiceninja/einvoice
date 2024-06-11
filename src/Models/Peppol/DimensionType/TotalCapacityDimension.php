<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\DimensionType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AttributeIDType\AttributeID;
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

class TotalCapacityDimension
{
	/** @var AttributeID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:AttributeID')]
	public $AttributeID;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:Measure')]
	public string $Measure;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:MinimumMeasure')]
	public string $MinimumMeasure;

	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('cbc:MaximumMeasure')]
	public string $MaximumMeasure;
}
