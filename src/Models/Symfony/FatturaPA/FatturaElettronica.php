<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaBodyType\FatturaElettronicaBody;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaHeaderType\FatturaElettronicaHeader;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class FatturaElettronica
{
	/** @var FatturaElettronicaHeader */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public $FatturaElettronicaHeader;

	/** @var FatturaElettronicaBody[] */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public array $FatturaElettronicaBody = [];
}
