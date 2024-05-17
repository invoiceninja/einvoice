<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\FatturaPrincipaleType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class FatturaPrincipale extends Data
{
	#[Max(20)]
	#[Min(1)]
	#[Regex('/(\p{Basic_Latin}{1,20})/u')]
	public string $NumeroFatturaPrincipale;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon $DataFatturaPrincipale;
}
