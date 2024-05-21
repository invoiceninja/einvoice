<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA\DatiGeneraliType;

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
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DatiGenerali extends Data
{
	#[Required]
	public DatiGeneraliDocumento $DatiGeneraliDocumento;

	/** @param array<DatiOrdineAcquisto> $DatiOrdineAcquisto */
	public array|Optional $DatiOrdineAcquisto;

	/** @param array<DatiContratto> $DatiContratto */
	public array|Optional $DatiContratto;

	/** @param array<DatiConvenzione> $DatiConvenzione */
	public array|Optional $DatiConvenzione;

	/** @param array<DatiRicezione> $DatiRicezione */
	public array|Optional $DatiRicezione;

	/** @param array<DatiFattureCollegate> $DatiFattureCollegate */
	public array|Optional $DatiFattureCollegate;

	/** @param array<DatiSAL> $DatiSAL */
	public array|Optional $DatiSAL;

	/** @param array<DatiDDT> $DatiDDT */
	public array|Optional $DatiDDT;
	public DatiTrasporto|Optional $DatiTrasporto;
	public FatturaPrincipale|Optional $FatturaPrincipale;
}
