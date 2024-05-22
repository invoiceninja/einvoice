<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaBodyType\FatturaElettronicaBody;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaHeaderType\FatturaElettronicaHeader;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;

class FatturaElettronica
{
	#[NotNull]
	#[NotBlank]
	public $FatturaElettronicaHeader;

	#[NotNull]
	#[NotBlank]
	// #[Type(FatturaElettronicaBody::class)]
	/** @var FatturaElettronicaBody[] $FatturaElettronicaBody */
	public $FatturaElettronicaBody;
}
