<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\AllegatiType\Allegati;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiBeniServiziType\DatiBeniServizi;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiGeneraliType\DatiGenerali;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiPagamentoType\DatiPagamento;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiVeicoliType\DatiVeicoli;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class FatturaElettronicaBody
{
	#[NotNull]
	public DatiGenerali $DatiGenerali;

	#[NotNull]
	public DatiBeniServizi $DatiBeniServizi;
	public DatiVeicoli $DatiVeicoli;

	/** @var DatiPagamento[] $DatiPagamento */
	public DatiPagamento $DatiPagamento;

	/** @var Allegati[] $Allegati */
	public Allegati $Allegati;
}
