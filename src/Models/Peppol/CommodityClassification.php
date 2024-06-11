<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\CargoTypeCodeType\CargoTypeCode;
use InvoiceNinja\EInvoice\Models\Peppol\CommodityCodeType\CommodityCode;
use InvoiceNinja\EInvoice\Models\Peppol\ItemClassificationCodeType\ItemClassificationCode;
use InvoiceNinja\EInvoice\Models\Peppol\NatureCodeType\NatureCode;
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
