<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\LanguageType;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Language extends Data
{
	public string|Optional $ID;
	public string|Optional $Name;
	public string|Optional $LocaleCode;
}
