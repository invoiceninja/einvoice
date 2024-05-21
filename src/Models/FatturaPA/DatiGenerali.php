<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiDDTType\DatiDDT;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiContratto;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiConvenzione;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiFattureCollegate;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiOrdineAcquisto;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiRicezione;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiGeneraliDocumentoType\DatiGeneraliDocumento;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiSALType\DatiSAL;
use Invoiceninja\Einvoice\Models\FatturaPA\DatiTrasportoType\DatiTrasporto;
use Invoiceninja\Einvoice\Models\FatturaPA\FatturaPrincipaleType\FatturaPrincipale;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class DatiGenerali extends Data
{
	#[Required]
	public DatiGeneraliDocumento $DatiGeneraliDocumento;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiOrdineAcquisto')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DatiOrdineAcquisto;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiContratto')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DatiContratto;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiConvenzione')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DatiConvenzione;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiRicezione')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DatiRicezione;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiFattureCollegate')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DatiFattureCollegate;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\DatiSALType\DatiSAL')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DatiSAL;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FatturaPA\DatiDDTType\DatiDDT')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $DatiDDT;
	public DatiTrasporto|Optional $DatiTrasporto;
	public FatturaPrincipale|Optional $FatturaPrincipale;
}
