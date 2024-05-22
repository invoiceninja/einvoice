<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiRiepilogo
{
	#[NotNull]
	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float $AliquotaIVA;

	private array $Natura_array = [
		'N1',
		'N2',
		'N2.1',
		'N2.2',
		'N3',
		'N3.1',
		'N3.2',
		'N3.3',
		'N3.4',
		'N3.5',
		'N3.6',
		'N4',
		'N5',
		'N6',
		'N6.1',
		'N6.2',
		'N6.3',
		'N6.4',
		'N6.5',
		'N6.6',
		'N6.7',
		'N6.8',
		'N6.9',
		'N7',
	];

	public string $Natura;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $SpeseAccessorie;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float $Arrotondamento;

	#[NotNull]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImponibileImporto;

	#[NotNull]
	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $Imposta;
	private array $EsigibilitaIVA_array = ['D', 'I', 'S'];

	#[Length(max: 1)]
	#[Length(min: 1)]
	public string $EsigibilitaIVA;

	#[Length(max: 100)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $RiferimentoNormativo;
}
