<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Symfony\Component\Validator\Constraints\NotNull;

class DatiSAL
{
	#[NotNull]
	public int $RiferimentoFase;
}
