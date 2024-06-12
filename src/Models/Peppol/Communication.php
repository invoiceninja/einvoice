<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\CodeType\ChannelCode;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class Communication
{
	/** @var ChannelCode */
	#[SerializedName('cbc:ChannelCode')]
	public $ChannelCode;

	/** @var string */
	#[SerializedName('cbc:Channel')]
	public string $Channel;

	/** @var string */
	#[SerializedName('cbc:Value')]
	public string $Value;
}
