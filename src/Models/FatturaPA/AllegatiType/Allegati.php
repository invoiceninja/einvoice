<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA\AllegatiType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
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

class Allegati
{
	/** @var string */
	#[Length(min: 1, max: 60)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,60}/u')]
	public string $NomeAttachment;

	/** @var string */
	#[Length(min: 1, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,10}/u')]
	public string $AlgoritmoCompressione;

	/** @var string */
	#[Length(min: 1, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,10}/u')]
	public string $FormatoAttachment;

	/** @var string */
	#[Length(min: 1, max: 100)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,100}/u')]
	public string $DescrizioneAttachment;

	/** @var mixed */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public mixed $Attachment;
}
