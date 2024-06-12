<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\AttributeID;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\MaximumMeasure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\Measure;
use InvoiceNinja\EInvoice\Models\Peppol\MeasureType\MinimumMeasure;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Dimension
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
