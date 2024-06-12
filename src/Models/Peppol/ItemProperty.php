<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ImportanceCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\NameCode;
use InvoiceNinja\EInvoice\Models\Peppol\DimensionType\RangeDimension;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\ItemPropertyGroupType\ItemPropertyGroup;
use InvoiceNinja\EInvoice\Models\Peppol\ItemPropertyRangeType\ItemPropertyRange;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\UsabilityPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\QuantityType\ValueQuantity;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class ItemProperty
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var NameCode */
	#[SerializedName('cbc:NameCode')]
	public $NameCode;

	/** @var string */
	#[SerializedName('cbc:TestMethod')]
	public string $TestMethod;

	/** @var string */
	#[SerializedName('cbc:Value')]
	public string $Value;

	/** @var ValueQuantity */
	#[SerializedName('cbc:ValueQuantity')]
	public $ValueQuantity;

	/** @var string */
	#[SerializedName('cbc:ValueQualifier')]
	public string $ValueQualifier;

	/** @var ImportanceCode */
	#[SerializedName('cbc:ImportanceCode')]
	public $ImportanceCode;

	/** @var string */
	#[SerializedName('cbc:ListValue')]
	public string $ListValue;

	/** @var UsabilityPeriod */
	#[SerializedName('cac:UsabilityPeriod')]
	public $UsabilityPeriod;

	/** @var ItemPropertyGroup[] */
	#[SerializedName('cac:ItemPropertyGroup')]
	public array $ItemPropertyGroup;

	/** @var RangeDimension */
	#[SerializedName('cac:RangeDimension')]
	public $RangeDimension;

	/** @var ItemPropertyRange */
	#[SerializedName('cac:ItemPropertyRange')]
	public $ItemPropertyRange;
}
