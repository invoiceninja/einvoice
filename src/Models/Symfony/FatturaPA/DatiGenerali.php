<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiDDTType\DatiDDT;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiDocumentiCorrelatiType\DatiContratto;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiDocumentiCorrelatiType\DatiConvenzione;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiDocumentiCorrelatiType\DatiFattureCollegate;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiDocumentiCorrelatiType\DatiOrdineAcquisto;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiDocumentiCorrelatiType\DatiRicezione;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiGeneraliDocumentoType\DatiGeneraliDocumento;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiSALType\DatiSAL;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiTrasportoType\DatiTrasporto;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaPrincipaleType\FatturaPrincipale;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class DatiGenerali
{
	#[NotNull]
	public DatiGeneraliDocumento $DatiGeneraliDocumento;

	/** @var DatiOrdineAcquisto[] $DatiOrdineAcquisto */
	public DatiOrdineAcquisto $DatiOrdineAcquisto;

	/** @var DatiContratto[] $DatiContratto */
	public DatiContratto $DatiContratto;

	/** @var DatiConvenzione[] $DatiConvenzione */
	public DatiConvenzione $DatiConvenzione;

	/** @var DatiRicezione[] $DatiRicezione */
	public DatiRicezione $DatiRicezione;

	/** @var DatiFattureCollegate[] $DatiFattureCollegate */
	public DatiFattureCollegate $DatiFattureCollegate;

	/** @var DatiSAL[] $DatiSAL */
	public DatiSAL $DatiSAL;

	/** @var DatiDDT[] $DatiDDT */
	public DatiDDT $DatiDDT;
	public DatiTrasporto $DatiTrasporto;
	public FatturaPrincipale $FatturaPrincipale;
}
