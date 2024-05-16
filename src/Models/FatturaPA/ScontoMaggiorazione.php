<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ScontoMaggiorazione extends Data
{
	public string $Tipo;
	public array $Tipo_array = ['SC' => 'SC = Sconto', 'MG' => 'MG = Maggiorazione'];
	public float|Optional $Percentuale;
	public float|Optional $Importo;
}
