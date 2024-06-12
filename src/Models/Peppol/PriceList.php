<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\StatusCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\ValidityPeriod;
use InvoiceNinja\EInvoice\Models\Peppol\PriceListType\PreviousPriceList;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class PriceList
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var StatusCode */
	#[SerializedName('cbc:StatusCode')]
	public $StatusCode;

	/** @var ValidityPeriod[] */
	#[SerializedName('cac:ValidityPeriod')]
	public array $ValidityPeriod;

	/** @var PreviousPriceList */
	#[SerializedName('cac:PreviousPriceList')]
	public $PreviousPriceList;
}
