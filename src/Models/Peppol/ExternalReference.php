<?php 

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

class ExternalReference
{
	/** @var string */
	#[SerializedName('cbc:URI')]
	public string $URI;

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

	/** @var string */
	#[SerializedName('cbc:MimeCode')]
	public string $MimeCode;

	/** @var string */
	#[SerializedName('cbc:FormatCode')]
	public string $FormatCode;

	/** @var string */
	#[SerializedName('cbc:EncodingCode')]
	public string $EncodingCode;

	/** @var string */
	#[SerializedName('cbc:CharacterSetCode')]
	public string $CharacterSetCode;

	/** @var string */
	#[SerializedName('cbc:FileName')]
	public string $FileName;

	/** @var string */
	#[SerializedName('cbc:Description')]
	public string $Description;
}
