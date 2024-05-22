<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaBodyType\FatturaElettronicaBody;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaHeaderType\FatturaElettronicaHeader;
use Symfony\Component\Validator\Constraints\NotNull;

class FatturaElettronica
{
	#[NotNull]
	public $FatturaElettronicaHeader;

	/** @var FatturaElettronicaBody[] $FatturaElettronicaBody */
	#[NotNull]
	public $FatturaElettronicaBody;
}
