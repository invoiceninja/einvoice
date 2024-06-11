<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\CommunicationType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\ChannelCodeType\ChannelCode;
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

class OtherCommunication
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
