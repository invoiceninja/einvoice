<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiRiepilogoType\DatiRiepilogo;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DettaglioLineeType\DettaglioLinee;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiBeniServizi
{
	/** @var DettaglioLinee[] $DettaglioLinee */
	#[NotNull]
	public DettaglioLinee $DettaglioLinee;

	/** @var DatiRiepilogo[] $DatiRiepilogo */
	#[NotNull]
	public DatiRiepilogo $DatiRiepilogo;
}
