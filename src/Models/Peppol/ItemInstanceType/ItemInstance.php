<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ItemInstanceType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\ItemPropertyType\AdditionalItemProperty;
use InvoiceNinja\EInvoice\Models\Peppol\LotIdentificationType\LotIdentification;
use InvoiceNinja\EInvoice\Models\Peppol\ProductTraceIDType\ProductTraceID;
use InvoiceNinja\EInvoice\Models\Peppol\RegistrationIDType\RegistrationID;
use InvoiceNinja\EInvoice\Models\Peppol\SerialIDType\SerialID;
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
	/** @var ProductTraceID */
	#[SerializedName('cbc:ProductTraceID')]
	public $ProductTraceID;

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

	/** @var RegistrationID */
	#[SerializedName('cbc:RegistrationID')]
	public $RegistrationID;

	/** @var SerialID */
	#[SerializedName('cbc:SerialID')]
	public $SerialID;

	/** @var AdditionalItemProperty[] */
	#[SerializedName('cac:AdditionalItemProperty')]
	public array $AdditionalItemProperty;

	/** @var LotIdentification */
	#[SerializedName('cac:LotIdentification')]
	public $LotIdentification;
}
