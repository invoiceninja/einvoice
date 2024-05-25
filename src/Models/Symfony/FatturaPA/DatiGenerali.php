<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use DateTime;
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
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
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
	public array $DatiOrdineAcquisto = [];

	/** @var DatiContratto[] */
	public array $DatiContratto = [];

	/** @var DatiConvenzione[] */
	public array $DatiConvenzione = [];

	/** @var DatiRicezione[] */
	public array $DatiRicezione = [];

	/** @var DatiFattureCollegate[] */
	public array $DatiFattureCollegate = [];

	/** @var DatiSAL[] */
	public array $DatiSAL = [];

	/** @var DatiDDT[] */
	public array $DatiDDT = [];

	/** @var DatiTrasporto */
	public $DatiTrasporto;

	/** @var FatturaPrincipale */
	public $FatturaPrincipale;
}
