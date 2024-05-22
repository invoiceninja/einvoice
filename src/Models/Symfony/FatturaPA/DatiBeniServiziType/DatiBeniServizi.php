<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBeniServiziType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioLineeType\DettaglioLinee;

class DatiBeniServizi
{
	/**
	 * @var DettaglioLinee[] $DettaglioLinee
	 * @var DettaglioLinee[] $DettaglioLinee
	 */
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public DettaglioLinee $DettaglioLinee;

	/**
	 * @var DatiRiepilogo[] $DatiRiepilogo
	 * @var DatiRiepilogo[] $DatiRiepilogo
	 */
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public DatiRiepilogo $DatiRiepilogo;
}
