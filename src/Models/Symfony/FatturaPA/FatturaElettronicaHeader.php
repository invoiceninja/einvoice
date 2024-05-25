<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CedentePrestatoreType\CedentePrestatore;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\CessionarioCommittenteType\CessionarioCommittente;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiTrasmissioneType\DatiTrasmissione;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\RappresentanteFiscaleType\RappresentanteFiscale;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\TerzoIntermediarioSoggettoEmittenteType\TerzoIntermediarioOSoggettoEmittente;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class FatturaElettronicaHeader
{
	#[NotNull]
	#[NotBlank]
	#[Valid]
	/** @var DatiTrasmissione */
	public $DatiTrasmissione;

	#[NotNull]
	#[NotBlank]
	#[Valid]
	public CedentePrestatore $CedentePrestatore;
	public RappresentanteFiscale $RappresentanteFiscale;

	#[NotNull]
	#[NotBlank]
	#[Valid]
	public CessionarioCommittente $CessionarioCommittente;
	public TerzoIntermediarioOSoggettoEmittente $TerzoIntermediarioOSoggettoEmittente;
	private array $SoggettoEmittente_array = ['CC', 'TZ'];

	#[Choice(['CC', 'TZ'])]
	public string $SoggettoEmittente;
}
