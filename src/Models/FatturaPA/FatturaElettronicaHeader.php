<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\CedentePrestatoreType\CedentePrestatore;
use Invoiceninja\Einvoice\Models\FatturaPA\CessionarioCommittenteType\CessionarioCommittente;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiTrasmissioneType\DatiTrasmissione;
use Invoiceninja\Einvoice\Models\FatturaPA\RappresentanteFiscaleType\RappresentanteFiscale;
use Invoiceninja\Einvoice\Models\FatturaPA\TerzoIntermediarioSoggettoEmittenteType\TerzoIntermediarioOSoggettoEmittente;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FatturaElettronicaHeader extends Data
{
	public DatiTrasmissione $DatiTrasmissione;
	public CedentePrestatore $CedentePrestatore;
	public RappresentanteFiscale|Optional $RappresentanteFiscale;
	public CessionarioCommittente $CessionarioCommittente;
	public TerzoIntermediarioOSoggettoEmittente|Optional $TerzoIntermediarioOSoggettoEmittente;
	public ?string $SoggettoEmittente;
	private array $SoggettoEmittente_array = ['CC' => 'Cessionario / Committente', 'TZ' => 'Terzo'];
}
