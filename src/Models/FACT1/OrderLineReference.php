<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\OrderReferenceType\OrderReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;

class OrderLineReference
{
	/** @var string */
	#[SerializedName('cbc:LineID')]
	public string $LineID;

	/** @var string */
	#[SerializedName('cbc:SalesOrderLineID')]
	public string $SalesOrderLineID;

	/** @var string */
	#[SerializedName('cbc:UUID')]
	public string $UUID;

	/** @var string */
	#[SerializedName('cbc:LineStatusCode')]
	public string $LineStatusCode;

	/** @var OrderReference */
	#[SerializedName('cac:OrderReference')]
	public $OrderReference;
}
