<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiSALType;

use Carbon\Carbon;

class DatiSAL
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public int $RiferimentoFase;
}
