<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiDocumentiCorrelatiType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiConvenzione
{
	/** @param RiferimentoNumeroLinea[] $RiferimentoNumeroLinea */
	public int $RiferimentoNumeroLinea;

	#[Length(min: 1, max: 20)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $IdDocumento;

	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $Data;

	#[Length(min: 1, max: 20)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumItem;

	#[Length(min: 1, max: 100)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $CodiceCommessaConvenzione;

	#[Length(min: 1, max: 15)]
	#[Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public string $CodiceCUP;

	#[Length(min: 1, max: 15)]
	#[Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public string $CodiceCIG;
}
