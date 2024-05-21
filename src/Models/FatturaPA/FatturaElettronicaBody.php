<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\AllegatiType\Allegati;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiBeniServiziType\DatiBeniServizi;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiGeneraliType\DatiGenerali;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiPagamentoType\DatiPagamento;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiVeicoliType\DatiVeicoli;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class FatturaElettronicaBody extends Data
{
	#[Required]
	public DatiGenerali $DatiGenerali;

	#[Required]
	public DatiBeniServizi $DatiBeniServizi;
	public DatiVeicoli|Optional $DatiVeicoli;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\DatiPagamentoType\DatiPagamento')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DatiPagamento;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\AllegatiType\Allegati')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Allegati;
}
