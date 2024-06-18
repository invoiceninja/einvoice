<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA;

use DateTime;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiAnagraficiVettoreType\DatiAnagraficiVettore;
use InvoiceNinja\EInvoice\Models\FatturaPA\IndirizzoType\IndirizzoResa;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiTrasporto
{
	/** @var DatiAnagraficiVettore */
	public $DatiAnagraficiVettore;

	/** @var string */
	#[Length(min: 1, max: 80)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,80}/u')]
	public string $MezzoTrasporto;

	/** @var string */
	#[Length(min: 1, max: 100)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,100}/u')]
	public string $CausaleTrasporto;

	/** @var integer */
	public int $NumeroColli;

	/** @var string */
	#[Length(min: 1, max: 100)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,100}/u')]
	public string $Descrizione;

	/** @var string */
	#[Length(min: 1, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}\x{00A0}-\x{00FF}]{1,10}/u')]
	public string $UnitaMisuraPeso;

	/** @var string */
	#[DecimalPrecision(2)]
	#[Regex('/[0-9]{1,4}\.[0-9]{1,2}/')]
	public string $PesoLordo;

	/** @var string */
	#[DecimalPrecision(2)]
	#[Regex('/[0-9]{1,4}\.[0-9]{1,2}/')]
	public string $PesoNetto;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	public ?DateTime $DataOraRitiro;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public ?DateTime $DataInizioTrasporto;

	/** @var string */
	#[Length(min: 3, max: 3)]
	#[Regex('/[A-Z]{3}/')]
	public string $TipoResa;

	/** @var IndirizzoResa */
	public $IndirizzoResa;

	/** @var ?\DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	public ?DateTime $DataOraConsegna;
}
