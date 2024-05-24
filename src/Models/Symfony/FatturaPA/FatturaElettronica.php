<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaBodyType\FatturaElettronicaBody;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaHeaderType\FatturaElettronicaHeader;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Valid;

class FatturaElettronica
{
	#[Valid]
	public FatturaElettronicaHeader $FatturaElettronicaHeader;

	/*
	 * @var FatturaElettronicaBody|FatturaElettronicaBody[] $FatturaElettronicaBody
	 */

	// #[All([new NotNull(), new NotBlank(), new Type(FatturaElettronicaBody::class)])]
	#[Valid]
	#[NotNull]
	#[NotBlank]
	public FatturaElettronicaBody$FatturaElettronicaBody;
}
