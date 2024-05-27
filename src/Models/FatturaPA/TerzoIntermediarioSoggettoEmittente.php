<?php 

namespace Invoiceninja\Einvoice\Models\FatturaPA;

use Invoiceninja\Einvoice\Models\FatturaPA\DatiAnagraficiTerzoIntermediarioType\DatiAnagrafici;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class TerzoIntermediarioSoggettoEmittente
{
	/** @var DatiAnagrafici */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $DatiAnagrafici;
}
