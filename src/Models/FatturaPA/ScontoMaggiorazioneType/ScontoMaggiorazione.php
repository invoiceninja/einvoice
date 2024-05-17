<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\ScontoMaggiorazioneType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ScontoMaggiorazione extends Data
{
	public string $Tipo;
	public array $Tipo_array = ['SC' => 'SC = Sconto', 'MG' => 'MG = Maggiorazione'];

	#[Regex('/[0-9]{1,3}\.[0-9]{2}/')]
	public float|Optional $Percentuale;

	#[Regex('/[\-]?[0-9]{1,11}\.[0-9]{2,8}/')]
	public float|Optional $Importo;
}
