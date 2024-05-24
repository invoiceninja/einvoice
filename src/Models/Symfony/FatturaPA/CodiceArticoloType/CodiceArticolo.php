<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CodiceArticoloType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Writer\Symfony\All;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class CodiceArticolo
{
	#[Length(min: 1, max: 35)]
	#[Regex('/[\x{0020}-\x{007E}]{1,35}/u')]
	public string $CodiceTipo;

	#[Length(min: 1, max: 35)]
	public string $CodiceValore;
}
