<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiDocumentiCorrelatiType;

use Carbon\Carbon;

class DatiConvenzione
{
	/** @var RiferimentoNumeroLinea[] $RiferimentoNumeroLinea */
	public int $RiferimentoNumeroLinea;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	#[\Symfony\Component\Validator\Constraints\Length(max: 20)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $IdDocumento;

	#[\Symfony\Component\Validator\Constraints\Date('Y-m-d')]
	public Carbon $Data;

	#[\Symfony\Component\Validator\Constraints\Length(max: 20)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $NumItem;

	#[\Symfony\Component\Validator\Constraints\Length(max: 100)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0000}-\x{00FF}]{1,100}/u')]
	public string $CodiceCommessaConvenzione;

	#[\Symfony\Component\Validator\Constraints\Length(max: 15)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public string $CodiceCUP;

	#[\Symfony\Component\Validator\Constraints\Length(max: 15)]
	#[\Symfony\Component\Validator\Constraints\Length(min: 1)]
	#[\Symfony\Component\Validator\Constraints\Regex('/[\x{0020}-\x{007E}]{1,15}/u')]
	public string $CodiceCIG;
}
