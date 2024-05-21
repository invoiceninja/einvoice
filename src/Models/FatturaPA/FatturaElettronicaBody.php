<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\AllegatiType\Allegati;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiBeniServiziType\DatiBeniServizi;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiGeneraliType\DatiGenerali;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiPagamentoType\DatiPagamento;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiVeicoliType\DatiVeicoli;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FatturaElettronicaBody extends Data
{
	#[Required]
	public ?DatiGenerali $DatiGenerali;

	#[Required]
	public ?DatiBeniServizi $DatiBeniServizi;
	public DatiVeicoli|Optional $DatiVeicoli;

	/** @param array<DatiPagamento> $DatiPagamento */
	public array|Optional $DatiPagamento;

	/** @param array<Allegati> $Allegati */
	public array|Optional $Allegati;
}
