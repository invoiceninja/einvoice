<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiGeneraliType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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
use Invoiceninja\Einvoice\Writer\Symfony\All;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiGenerali
{
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public DatiGeneraliDocumento $DatiGeneraliDocumento;

	/** @param DatiOrdineAcquisto[] $DatiOrdineAcquisto */
	public DatiOrdineAcquisto $DatiOrdineAcquisto;

	/** @param DatiContratto[] $DatiContratto */
	public DatiContratto $DatiContratto;

	/** @param DatiConvenzione[] $DatiConvenzione */
	public DatiConvenzione $DatiConvenzione;

	/** @param DatiRicezione[] $DatiRicezione */
	public DatiRicezione $DatiRicezione;

	/** @param DatiFattureCollegate[] $DatiFattureCollegate */
	public DatiFattureCollegate $DatiFattureCollegate;

	/** @param DatiSAL[] $DatiSAL */
	public DatiSAL $DatiSAL;

	/** @param DatiDDT[] $DatiDDT */
	public DatiDDT $DatiDDT;
	public DatiTrasporto $DatiTrasporto;
	public FatturaPrincipale $FatturaPrincipale;
}
