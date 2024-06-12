<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ExternalReferenceType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\CharacterSetCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\EncodingCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\FormatCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\MimeCode;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\URI;
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

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ExpiryDate')]
	public DateTime $ExpiryDate;

	/** @var DateTime */
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
