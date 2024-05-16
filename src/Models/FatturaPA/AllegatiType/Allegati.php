<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\AllegatiType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Allegati extends Data
{
	#[Max(60)]
	#[Min(1)]
	#[Regex('[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}')]
	public string $NomeAttachment;

	#[Max(10)]
	#[Min(1)]
	#[Regex('(\p{IsBasicLatin}{1,10})')]
	public string|Optional $AlgoritmoCompressione;

	#[Max(10)]
	#[Min(1)]
	#[Regex('(\p{IsBasicLatin}{1,10})')]
	public string|Optional $FormatoAttachment;

	#[Max(100)]
	#[Min(1)]
	#[Regex('[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,100}')]
	public string|Optional $DescrizioneAttachment;
	public mixed $Attachment;
}
