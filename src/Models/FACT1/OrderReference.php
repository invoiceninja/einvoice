<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;

class OrderReference
{
	/** @var string */
	#[Length(min: null, max: 200)]
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[Length(min: null, max: 200)]
	#[SerializedName('cbc:SalesOrderID')]
	public string $SalesOrderID;

	/** @var bool */
	#[SerializedName('cbc:CopyIndicator')]
	public bool $CopyIndicator;

	/** @var string */
	#[SerializedName('cbc:UUID')]
	public string $UUID;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:IssueDate')]
	public DateTime $IssueDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:IssueTime')]
	public DateTime $IssueTime;

	/** @var string */
	#[SerializedName('cbc:CustomerReference')]
	public string $CustomerReference;

	/** @var string */
	#[SerializedName('cbc:OrderTypeCode')]
	public string $OrderTypeCode;

	/** @var DocumentReference */
	#[SerializedName('cac:DocumentReference')]
	public $DocumentReference;
}
