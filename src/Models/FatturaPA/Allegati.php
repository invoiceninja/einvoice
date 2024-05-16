<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Allegati extends Data
{
	public string $NomeAttachment;
	public string|Optional $AlgoritmoCompressione;
	public string|Optional $FormatoAttachment;
	public string|Optional $DescrizioneAttachment;
	public mixed $Attachment;
}
