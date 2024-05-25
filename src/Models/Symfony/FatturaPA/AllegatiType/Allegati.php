<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AllegatiType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
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
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $NomeAttachment;

	/** @var string */
	#[Length(min: 1, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $AlgoritmoCompressione;

	/** @var string */
	#[Length(min: 1, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $FormatoAttachment;

	/** @var string */
	#[Length(min: 1, max: 100)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $DescrizioneAttachment;

	/** @var mixed */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public mixed $Attachment;
}
