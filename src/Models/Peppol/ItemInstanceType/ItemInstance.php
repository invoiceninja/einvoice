<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ItemInstanceType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\ItemPropertyType\AdditionalItemProperty;
use InvoiceNinja\EInvoice\Models\Peppol\LotIdentificationType\LotIdentification;
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

class ItemInstance
{
	/** @var string */
	#[SerializedName('cbc:ProductTraceID')]
	public string $ProductTraceID;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ManufactureDate')]
	public DateTime $ManufactureDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ManufactureTime')]
	public DateTime $ManufactureTime;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:BestBeforeDate')]
	public DateTime $BestBeforeDate;

	/** @var string */
	#[SerializedName('cbc:RegistrationID')]
	public string $RegistrationID;

	/** @var string */
	#[SerializedName('cbc:SerialID')]
	public string $SerialID;

	/** @var AdditionalItemProperty[] */
	#[SerializedName('cac:AdditionalItemProperty')]
	public array $AdditionalItemProperty;

	/** @var LotIdentification */
	#[SerializedName('cac:LotIdentification')]
	public $LotIdentification;
}
