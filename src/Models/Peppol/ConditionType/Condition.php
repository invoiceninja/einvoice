<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ConditionType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AttributeIDType\AttributeID;
use InvoiceNinja\EInvoice\Models\Peppol\MaximumMeasureType\MaximumMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\Measure;
use InvoiceNinja\EInvoice\Models\Peppol\MinimumMeasureType\MinimumMeasure;
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

class Condition
{
	/** @var AttributeID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:AttributeID')]
	public $AttributeID;

	/** @var Measure */
	#[SerializedName('cbc:Measure')]
	public $Measure;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;

	/** @var MinimumMeasure */
	#[SerializedName('cbc:MinimumMeasure')]
	public $MinimumMeasure;

	/** @var MaximumMeasure */
	#[SerializedName('cbc:MaximumMeasure')]
	public $MaximumMeasure;
}
