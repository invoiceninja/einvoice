<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiGeneraliDocumentoType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBolloType\DatiBollo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiCassaPrevidenzialeType\DatiCassaPrevidenziale;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRitenutaType\DatiRitenuta;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ScontoMaggiorazioneType\ScontoMaggiorazione;

class DatiGeneraliDocumento
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public string $TipoDocumento;

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

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Length(max: 3)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 3)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[A-Z]{3}/')]
	public string $Divisa;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Date('Y-m-d')]
	public Carbon $Data;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Length(max: 20)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $Numero;

	/** @var DatiRitenuta[] $DatiRitenuta */
	public DatiRitenuta $DatiRitenuta;
	public DatiBollo $DatiBollo;

	/** @var DatiCassaPrevidenziale[] $DatiCassaPrevidenziale */
	public DatiCassaPrevidenziale $DatiCassaPrevidenziale;

	/** @var ScontoMaggiorazione[] $ScontoMaggiorazione */
	public ScontoMaggiorazione $ScontoMaggiorazione;

	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $ImportoTotaleDocumento;

	#[\Symfony\Component\Validator\Constraints\Regex('/[\-]?[0-9]{1,11}\.[0-9]{2}/')]
	public float $Arrotondamento;

	/** @var Causale[] $Causale */
	#[\Symfony\Component\Validator\Constraints\Length(max: 200)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\p{L}]{1,200}/u')]
	public string $Causale;
	public string $Art73;
	private array $Art73_array = ['SI'];
}
