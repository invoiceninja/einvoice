<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\RangeDimension;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyGroupType\ItemPropertyGroup;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyRangeType\ItemPropertyRange;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\UsabilityPeriod;
use Invoiceninja\Einvoice\Models\FACT1\QuantityType\ValueQuantity;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;

class ItemProperty
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[Length(min: null, max: 50)]
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var string */
	#[SerializedName('cbc:NameCode')]
	public string $NameCode;

	/** @var string */
	#[SerializedName('cbc:TestMethod')]
	public string $TestMethod;

	/** @var string */
	#[Length(min: null, max: 100)]
	#[SerializedName('cbc:Value')]
	public string $Value;

	/** @var ValueQuantity */
	#[SerializedName('cbc:ValueQuantity')]
	public $ValueQuantity;

	/** @var string */
	#[SerializedName('cbc:ValueQualifier')]
	public string $ValueQualifier;

	/** @var string */
	#[SerializedName('cbc:ImportanceCode')]
	public string $ImportanceCode;

	/** @var string */
	#[SerializedName('cbc:ListValue')]
	public string $ListValue;

	/** @var UsabilityPeriod */
	#[SerializedName('cac:UsabilityPeriod')]
	public $UsabilityPeriod;

	/** @var ItemPropertyGroup[] */
	#[SerializedName('cac:ItemPropertyGroup')]
	public array $ItemPropertyGroup = [];

	/** @var RangeDimension */
	#[SerializedName('cac:RangeDimension')]
	public $RangeDimension;

	/** @var ItemPropertyRange */
	#[SerializedName('cac:ItemPropertyRange')]
	public $ItemPropertyRange;
}
