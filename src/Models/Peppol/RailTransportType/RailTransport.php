<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\RailTransportType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\RailCarID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\TrainID;
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

class RailTransport
{
	/** @var TrainID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:TrainID')]
	public $TrainID;

	/** @var RailCarID */
	#[SerializedName('cbc:RailCarID')]
	public $RailCarID;
}
