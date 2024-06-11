<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\CharacterSetCodeType\CharacterSetCode;
use InvoiceNinja\EInvoice\Models\Peppol\EncodingCodeType\EncodingCode;
use InvoiceNinja\EInvoice\Models\Peppol\FormatCodeType\FormatCode;
use InvoiceNinja\EInvoice\Models\Peppol\MimeCodeType\MimeCode;
use InvoiceNinja\EInvoice\Models\Peppol\URIType\URI;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class ExternalReference
{
	/** @var URI */
	#[SerializedName('cbc:URI')]
	public $URI;

	/** @var string */
	#[SerializedName('cbc:DocumentHash')]
	public string $DocumentHash;

	/** @var string */
	#[SerializedName('cbc:HashAlgorithmMethod')]
	public string $HashAlgorithmMethod;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ExpiryDate')]
	public DateTime $ExpiryDate;

	/** @var \DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ExpiryTime')]
	public DateTime $ExpiryTime;

	/** @var MimeCode */
	#[SerializedName('cbc:MimeCode')]
	public $MimeCode;

	/** @var FormatCode */
	#[SerializedName('cbc:FormatCode')]
	public $FormatCode;

	/** @var EncodingCode */
	#[SerializedName('cbc:EncodingCode')]
	public $EncodingCode;

	/** @var CharacterSetCode */
	#[SerializedName('cbc:CharacterSetCode')]
	public $CharacterSetCode;

	/** @var string */
	#[SerializedName('cbc:FileName')]
	public string $FileName;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;
}
