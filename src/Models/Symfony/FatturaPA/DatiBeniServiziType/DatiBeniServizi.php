<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBeniServiziType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioLineeType\DettaglioLinee;

class DatiBeniServizi
{
	/** @var DettaglioLinee[] $DettaglioLinee */
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public DettaglioLinee $DettaglioLinee;

	/** @var DatiRiepilogo[] $DatiRiepilogo */
	#[\Symfony\Component\Validator\Constraints\NotNull]
	#[\Symfony\Component\Validator\Constraints\NotBlank]
	public DatiRiepilogo $DatiRiepilogo;
}
