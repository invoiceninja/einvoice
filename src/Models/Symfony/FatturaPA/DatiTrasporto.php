<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use DateTime;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiVettoreType\DatiAnagraficiVettore;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\IndirizzoResa;
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
	public DatiAnagraficiVettore $DatiAnagraficiVettore;

	#[Length(min: 1, max: 80)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,80}/u')]
	public string $MezzoTrasporto;

	#[Length(min: 1, max: 100)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $CausaleTrasporto;
	public int $NumeroColli;

	#[Length(min: 1, max: 100)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $Descrizione;

	#[Length(min: 1, max: 10)]
	#[Regex('/[\x{0020}-\x{007E}]{1,10}/u')]
	public string $UnitaMisuraPeso;

	#[DecimalPrecision(2)]
	#[Regex('/[0-9]{1,4}\.[0-9]{1,2}/')]
	public float|string $PesoLordo;

	#[DecimalPrecision(2)]
	#[Regex('/[0-9]{1,4}\.[0-9]{1,2}/')]
	public float|string $PesoNetto;

	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	public DateTime $DataOraRitiro;

	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	public DateTime $DataInizioTrasporto;

	#[Length(min: 3, max: 3)]
	#[Regex('/[A-Z]{3}/')]
	public string $TipoResa;
	public IndirizzoResa $IndirizzoResa;

	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	public DateTime $DataOraConsegna;
}
