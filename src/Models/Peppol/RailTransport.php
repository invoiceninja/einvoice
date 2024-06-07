<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class RailTransport
{
	/** @var string */
	#[SerializedName('cbc:TrainID')]
	public string $TrainID;

	/** @var string */
	#[SerializedName('cbc:RailCarID')]
	public string $RailCarID;
}
