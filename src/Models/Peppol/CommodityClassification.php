<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class CommodityClassification
{
	/** @var string */
	#[SerializedName('cbc:NatureCode')]
	public string $NatureCode;

	/** @var string */
	#[SerializedName('cbc:CargoTypeCode')]
	public string $CargoTypeCode;

	/** @var string */
	#[SerializedName('cbc:CommodityCode')]
	public string $CommodityCode;

	/** @var string */
	#[SerializedName('cbc:ItemClassificationCode')]
	public string $ItemClassificationCode;
}
