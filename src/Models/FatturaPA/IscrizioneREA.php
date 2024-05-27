<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class IscrizioneREA
{
	/** @var string */
	#[Length(min: 2, max: 2)]
	#[Regex('/[A-Z]{2}/')]
	public string $Ufficio;

	/** @var string */
	#[Length(min: 1, max: 20)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,20}/u')]
	public string $NumeroREA;

	/** @var string */
	#[DecimalPrecision(2)]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public string $CapitaleSociale;
	private array $SocioUnico_array = ['SU', 'SM'];

	/** @var string */
	#[Choice(['SU', 'SM'])]
	public string $SocioUnico;
	private array $StatoLiquidazione_array = ['LS', 'LN'];

	/** @var string */
	#[Choice(['LS', 'LN'])]
	public string $StatoLiquidazione;
}
