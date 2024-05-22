<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CedentePrestatoreType\CedentePrestatore;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CessionarioCommittenteType\CessionarioCommittente;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiTrasmissioneType\DatiTrasmissione;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\RappresentanteFiscaleType\RappresentanteFiscale;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\TerzoIntermediarioSoggettoEmittenteType\TerzoIntermediarioOSoggettoEmittente;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class FatturaElettronicaHeader
{
	#[NotNull]
	#[NotBlank]
	public DatiTrasmissione $DatiTrasmissione;

	#[NotNull]
	#[NotBlank]
	public CedentePrestatore $CedentePrestatore;
	public RappresentanteFiscale $RappresentanteFiscale;

	#[NotNull]
	#[NotBlank]
	public CessionarioCommittente $CessionarioCommittente;
	public TerzoIntermediarioOSoggettoEmittente $TerzoIntermediarioOSoggettoEmittente;
	private array $SoggettoEmittente_array = ['CC', 'TZ'];
	public string $SoggettoEmittente;
}
