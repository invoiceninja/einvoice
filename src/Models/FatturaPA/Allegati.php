<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Allegati extends Data
{
	public ?string $NomeAttachment;
	public ?string $AlgoritmoCompressione;
	public ?string $FormatoAttachment;
	public ?string $DescrizioneAttachment;
	public mixed $Attachment;
}
