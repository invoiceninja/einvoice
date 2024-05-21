<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\CedentePrestatoreType\CedentePrestatore;
use Invoiceninja\Einvoice\Models\FatturaPA\CessionarioCommittenteType\CessionarioCommittente;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiTrasmissioneType\DatiTrasmissione;
use Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleType\RappresentanteFiscale;
use Invoiceninja\Einvoice\Models\FatturaPA\TerzoIntermediarioSoggettoEmittenteType\TerzoIntermediarioOSoggettoEmittente;
use Spatie\LaravelData\Attributes\Validation\Required;
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
	private array $SoggettoEmittente_array = ['CC' => 'Cessionario / Committente', 'TZ' => 'Terzo'];

	#[\Spatie\LaravelData\Attributes\Validation\In(CC: 'Cessionario / Committente', TZ: 'Terzo')]
	public string|Optional $SoggettoEmittente;
}
