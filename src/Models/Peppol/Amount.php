<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class Amount
{
	/** @var string */
	#[DecimalPrecision(2)]
	#[SerializedName('#')]
	public string $amount;

	/** @var string */
	#[SerializedName('@currencyID')]
	public string $currencyID;
}
