<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\CessionarioCommittenteType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiCessionarioType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\Sede;
use Invoiceninja\Einvoice\Models\FatturaPA\IndirizzoType\StabileOrganizzazione;
use Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleCessionarioType\RappresentanteFiscale;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CessionarioCommittente extends Data
{
	#[Required]
	public DatiAnagrafici $DatiAnagrafici;

	#[Required]
	public Sede $Sede;
	public StabileOrganizzazione|Optional $StabileOrganizzazione;
	public RappresentanteFiscale|Optional $RappresentanteFiscale;
}
