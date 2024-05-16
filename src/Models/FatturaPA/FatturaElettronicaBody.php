<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\AllegatiType\Allegati;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiBeniServiziType\DatiBeniServizi;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiGeneraliType\DatiGenerali;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiPagamentoType\DatiPagamento;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiVeicoliType\DatiVeicoli;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FatturaElettronicaBody extends Data
{
	public DatiGenerali $DatiGenerali;
	public DatiBeniServizi $DatiBeniServizi;
	public DatiVeicoli|Optional $DatiVeicoli;
	public DatiPagamento|Optional $DatiPagamento;
	public Allegati|Optional $Allegati;
}
