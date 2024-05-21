<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\AllegatiType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Allegati extends Data
{
	#[Required]
	#[Max(60)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,60}/u')]
	public string $NomeAttachment;

	#[Max(10)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string|Optional $AlgoritmoCompressione;

	#[Max(10)]
	#[Min(1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string|Optional $FormatoAttachment;

	#[Max(100)]
	#[Min(1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string|Optional $DescrizioneAttachment;

	#[Required]
	public mixed $Attachment;
}
