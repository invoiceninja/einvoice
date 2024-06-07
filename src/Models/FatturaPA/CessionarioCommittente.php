<?php 

namespace InvoiceNinja\EInvoice\Models\FatturaPA;

use InvoiceNinja\EInvoice\Models\FatturaPA\DatiAnagraficiCessionarioType\DatiAnagrafici;
use InvoiceNinja\EInvoice\Models\FatturaPA\IndirizzoType\Sede;
use InvoiceNinja\EInvoice\Models\FatturaPA\IndirizzoType\StabileOrganizzazione;
use InvoiceNinja\EInvoice\Models\FatturaPA\RappresentanteFiscaleCessionarioType\RappresentanteFiscale;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class CessionarioCommittente
{
	/** @var DatiAnagrafici */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $DatiAnagrafici;

	/** @var Sede */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $Sede;

	/** @var StabileOrganizzazione */
	public $StabileOrganizzazione;

	/** @var RappresentanteFiscale */
	public $RappresentanteFiscale;
}
