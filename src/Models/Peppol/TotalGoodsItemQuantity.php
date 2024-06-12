<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class TotalGoodsItemQuantity
{
	/** @var string */
	#[SerializedName('#')]
	public string $value;

	/** @var string */
	#[SerializedName('@unitCode')]
	public string $unitCode;

	/** @var string */
	#[SerializedName('@unitCodeListID')]
	public string $unitCodeListID;

	/** @var string */
	#[SerializedName('@unitCodeListAgencyID')]
	public string $unitCodeListAgencyID;

	/** @var string */
	#[SerializedName('@unitCodeListAgencyName')]
	public string $unitCodeListAgencyName;
}
