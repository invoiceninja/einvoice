<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBolloType\DatiBollo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiCassaPrevidenzialeType\DatiCassaPrevidenziale;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRitenutaType\DatiRitenuta;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ScontoMaggiorazioneType\ScontoMaggiorazione;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiGeneraliDocumento
{
	private array $TipoDocumento_array = [
		'TD01',
		'TD02',
		'TD03',
		'TD04',
		'TD05',
		'TD06',
		'TD16',
		'TD17',
		'TD18',
		'TD19',
		'TD20',
		'TD21',
		'TD22',
		'TD23',
		'TD24',
		'TD25',
		'TD26',
		'TD27',
		'TD28',
	];

	#[NotNull]
	public string $TipoDocumento;

	#[NotNull]
	#[Length(max: 3)]
	#[Length(min: 3)]
	#[Regex('/[A-Z]{3}/')]
	public string $Divisa;

	#[NotNull]
	public Carbon $Data;

	#[NotNull]
	#[Length(max: 20)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $Numero;

	/** @var DatiRitenuta[] $DatiRitenuta */
	public DatiRitenuta $DatiRitenuta;
	public DatiBollo $DatiBollo;

	/** @var DatiCassaPrevidenziale[] $DatiCassaPrevidenziale */
	public DatiCassaPrevidenziale $DatiCassaPrevidenziale;

	/** @var ScontoMaggiorazione[] $ScontoMaggiorazione */
	public ScontoMaggiorazione $ScontoMaggiorazione;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImportoTotaleDocumento;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $Arrotondamento;

	/** @var Causale[] $Causale */
	#[Length(max: 200)]
	#[Length(min: 1)]
	#[Regex('/[\p{L}]{1,200}/u')]
	public string $Causale;
	private array $Art73_array = ['SI'];
	public string $Art73;
}
