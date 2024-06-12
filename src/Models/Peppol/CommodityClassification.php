<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CargoTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CommodityCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ItemClassificationCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\NatureCode;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class CommodityClassification
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
