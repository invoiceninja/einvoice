<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiCessionarioType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\Sede;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\StabileOrganizzazione;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\RappresentanteFiscaleCessionarioType\RappresentanteFiscale;
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
