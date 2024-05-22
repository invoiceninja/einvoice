<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaBodyType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AllegatiType\Allegati;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBeniServiziType\DatiBeniServizi;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiGeneraliType\DatiGenerali;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiPagamentoType\DatiPagamento;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiVeicoliType\DatiVeicoli;

class FatturaElettronicaBody
{
	#[\Symfony\Component\Validator\Constraints\NotNull]
	public DatiGenerali $DatiGenerali;

	#[\Symfony\Component\Validator\Constraints\NotNull]
	public DatiBeniServizi $DatiBeniServizi;
	public DatiVeicoli $DatiVeicoli;

	/**
	 * @var DatiPagamento[] $DatiPagamento
	 * @var DatiPagamento[] $DatiPagamento
	 */
	public DatiPagamento $DatiPagamento;

	/**
	 * @var Allegati[] $Allegati
	 * @var Allegati[] $Allegati
	 */
	public Allegati $Allegati;
}
