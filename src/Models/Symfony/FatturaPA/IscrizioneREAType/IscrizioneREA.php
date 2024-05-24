<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IscrizioneREAType;

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

class IscrizioneREA
{
	#[Length(min: 2, max: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $Ufficio;

	#[Length(min: 1, max: 20)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumeroREA;

	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float|string $CapitaleSociale;

	#[Choice(['SU', 'SM'])]
	public string $SocioUnico;
	private array $SocioUnico_array = ['SU', 'SM'];

	#[Choice(['LS', 'LN'])]
	public string $StatoLiquidazione;
	private array $StatoLiquidazione_array = ['LS', 'LN'];
}
