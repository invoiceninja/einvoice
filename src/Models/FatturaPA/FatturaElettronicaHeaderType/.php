<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA\FatturaElettronicaHeaderType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\FatturaPA\CedentePrestatoreType\CedentePrestatore;
use InvoiceNinja\EInvoice\Models\FatturaPA\CessionarioCommittenteType\CessionarioCommittente;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiTrasmissioneType\DatiTrasmissione;
use InvoiceNinja\EInvoice\Models\FatturaPA\RappresentanteFiscaleType\RappresentanteFiscale;
use InvoiceNinja\EInvoice\Models\FatturaPA\TerzoIntermediarioSoggettoEmittenteType\TerzoIntermediarioOSoggettoEmittente;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class FatturaElettronicaHeader
{
	/** @var DatiTrasmissione */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $DatiTrasmissione;

	/** @var CedentePrestatore */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $CedentePrestatore;

	/** @var RappresentanteFiscale */
	public $RappresentanteFiscale;

	/** @var CessionarioCommittente */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $CessionarioCommittente;

	/** @var TerzoIntermediarioOSoggettoEmittente */
	public $TerzoIntermediarioOSoggettoEmittente;

	/** @var string */
	#[Choice(['CC', 'TZ'])]
	public string $SoggettoEmittente;
	private array $SoggettoEmittente_array = ['CC', 'TZ'];
}
