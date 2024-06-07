<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class Communication
{
	/** @var string */
	#[SerializedName('cbc:ChannelCode')]
	public string $ChannelCode;

	/** @var string */
	#[SerializedName('cbc:Channel')]
	public string $Channel;

	/** @var string */
	#[SerializedName('cbc:Value')]
	public string $Value;
}
