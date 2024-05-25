<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\ContattiType\Contatti;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\DatiAnagraficiCedenteType\DatiAnagrafici;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\Sede;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IndirizzoType\StabileOrganizzazione;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\IscrizioneREAType\IscrizioneREA;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class CedentePrestatore
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

	/** @var IscrizioneREA */
	public $IscrizioneREA;

	/** @var Contatti */
	public $Contatti;

	#[Length(min: 1, max: 20)]
	#[Regex('/[\x{0020}-\x{007E}]{1,20}/u')]
	public string $RiferimentoAmministrazione;
}
