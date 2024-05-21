<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\FatturaElettronicaHeaderType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\CedentePrestatoreType\CedentePrestatore;
use Invoiceninja\Einvoice\Models\FatturaPA\CessionarioCommittenteType\CessionarioCommittente;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiTrasmissioneType\DatiTrasmissione;
use Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleType\RappresentanteFiscale;
use Invoiceninja\Einvoice\Models\FatturaPA\TerzoIntermediarioSoggettoEmittenteType\TerzoIntermediarioOSoggettoEmittente;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FatturaElettronicaHeader extends Data
{
	#[Required]
	public DatiTrasmissione $DatiTrasmissione;

	#[Required]
	public CedentePrestatore $CedentePrestatore;
	public RappresentanteFiscale|Optional $RappresentanteFiscale;

	#[Required]
	public CessionarioCommittente $CessionarioCommittente;
	public TerzoIntermediarioOSoggettoEmittente|Optional $TerzoIntermediarioOSoggettoEmittente;
	public string|Optional $SoggettoEmittente;
	private array $SoggettoEmittente_array = ['CC', 'TZ'];
}
