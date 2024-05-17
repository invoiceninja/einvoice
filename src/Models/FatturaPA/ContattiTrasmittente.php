<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ContattiTrasmittente extends Data
{
	public string|Optional $Telefono;
	public string|Optional $Email;
}