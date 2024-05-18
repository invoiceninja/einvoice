<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Contatti extends Data
{
	public string|Optional $Telefono;
	public string|Optional $Fax;
	public string|Optional $Email;
}
