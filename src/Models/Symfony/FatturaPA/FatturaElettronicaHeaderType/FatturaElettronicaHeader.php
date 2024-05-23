<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaHeaderType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CedentePrestatoreType\CedentePrestatore;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CessionarioCommittenteType\CessionarioCommittente;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiTrasmissioneType\DatiTrasmissione;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\RappresentanteFiscaleType\RappresentanteFiscale;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\TerzoIntermediarioSoggettoEmittenteType\TerzoIntermediarioOSoggettoEmittente;

class FatturaElettronicaHeader
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public DatiTrasmissione $DatiTrasmissione;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public CedentePrestatore $CedentePrestatore;
	public RappresentanteFiscale $RappresentanteFiscale;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public CessionarioCommittente $CessionarioCommittente;
	public TerzoIntermediarioOSoggettoEmittente $TerzoIntermediarioOSoggettoEmittente;

	#[\Symfony\Component\Validator\Constraints\Choice('CC', 'TZ')]
	public string $SoggettoEmittente;
	private array $SoggettoEmittente_array = ['CC', 'TZ'];
}
