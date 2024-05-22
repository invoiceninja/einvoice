<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiDocumentiCorrelati
{
	/** @var RiferimentoNumeroLinea[] $RiferimentoNumeroLinea */
	public int $RiferimentoNumeroLinea;

	#[NotNull]
	#[Length(max: 20)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $IdDocumento;
	public Carbon $Data;

	#[Length(max: 20)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumItem;

	#[Length(max: 100)]
	#[Length(min: 1)]
	#[Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $CodiceCommessaConvenzione;

	#[Length(max: 15)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public string $CodiceCUP;

	#[Length(max: 15)]
	#[Length(min: 1)]
	#[Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public string $CodiceCIG;
}
