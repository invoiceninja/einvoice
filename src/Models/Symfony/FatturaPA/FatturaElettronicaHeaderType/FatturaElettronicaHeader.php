<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaHeaderType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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
	public DatiTrasmissione $DatiTrasmissione;

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

	#[Choice(['CC', 'TZ'])]
	public string $SoggettoEmittente;
	private array $SoggettoEmittente_array = ['CC', 'TZ'];
}
