<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Allegati extends Data
{
	#[Required]
	public string $NomeAttachment;
	public string|Optional $AlgoritmoCompressione;
	public string|Optional $FormatoAttachment;
	public string|Optional $DescrizioneAttachment;

	#[Required]
	public mixed $Attachment;
}
