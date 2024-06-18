<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ProductTraceID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\RegistrationID;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\SerialID;
use InvoiceNinja\EInvoice\Models\Peppol\ItemPropertyType\AdditionalItemProperty;
use InvoiceNinja\EInvoice\Models\Peppol\LotIdentificationType\LotIdentification;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class ItemInstance
{
	/** @var ProductTraceID */
	#[SerializedName('cbc:ProductTraceID')]
	public $ProductTraceID;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ManufactureDate')]
	public ?DateTime $ManufactureDate;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ManufactureTime')]
	public ?DateTime $ManufactureTime;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:BestBeforeDate')]
	public ?DateTime $BestBeforeDate;

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
