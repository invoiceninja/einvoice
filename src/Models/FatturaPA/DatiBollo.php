<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiBollo extends Data
{
	public string $BolloVirtuale;
	public array $BolloVirtuale_array = ['SI' => 'SI'];
	public float|Optional $ImportoBollo;
}
