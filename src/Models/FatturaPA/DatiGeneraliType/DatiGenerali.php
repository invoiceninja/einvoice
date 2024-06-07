<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA\DatiGeneraliType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiDDTType\DatiDDT;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiContratto;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiConvenzione;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiFattureCollegate;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiOrdineAcquisto;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiDocumentiCorrelatiType\DatiRicezione;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiGeneraliDocumentoType\DatiGeneraliDocumento;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiSALType\DatiSAL;
use InvoiceNinja\EInvoice\Models\FatturaPA\DatiTrasportoType\DatiTrasporto;
use InvoiceNinja\EInvoice\Models\FatturaPA\FatturaPrincipaleType\FatturaPrincipale;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class DatiGenerali
{
	/** @var DatiGeneraliDocumento */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $DatiGeneraliDocumento;

	/** @var DatiOrdineAcquisto[] */
	public array $DatiOrdineAcquisto;

	/** @var DatiContratto[] */
	public array $DatiContratto;

	/** @var DatiConvenzione[] */
	public array $DatiConvenzione;

	/** @var DatiRicezione[] */
	public array $DatiRicezione;

	/** @var DatiFattureCollegate[] */
	public array $DatiFattureCollegate;

	/** @var DatiSAL[] */
	public array $DatiSAL;

	/** @var DatiDDT[] */
	public array $DatiDDT;

	/** @var DatiTrasporto */
	public $DatiTrasporto;

	/** @var FatturaPrincipale */
	public $FatturaPrincipale;
}
