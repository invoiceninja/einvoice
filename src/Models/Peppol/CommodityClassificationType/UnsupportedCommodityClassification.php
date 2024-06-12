<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\CommodityClassificationType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CargoTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CommodityCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ItemClassificationCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\NatureCode;
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

class UnsupportedCommodityClassification
{
	/** @var NatureCode */
	#[SerializedName('cbc:NatureCode')]
	public $NatureCode;

	/** @var CargoTypeCode */
	#[SerializedName('cbc:CargoTypeCode')]
	public $CargoTypeCode;

	/** @var CommodityCode */
	#[SerializedName('cbc:CommodityCode')]
	public $CommodityCode;

	/** @var ItemClassificationCode */
	#[SerializedName('cbc:ItemClassificationCode')]
	public $ItemClassificationCode;
}
