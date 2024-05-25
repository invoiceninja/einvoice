<?php 

namespace Invoiceninja\Einvoice\Models\Symfony\FatturaPA;

use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaBodyType\FatturaElettronicaBody;
use Invoiceninja\Einvoice\Models\Symfony\FatturaPA\FatturaElettronicaHeaderType\FatturaElettronicaHeader;

class FatturaElettronica
{
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[Type(FatturaElettronicaHeader::class)]
	/** 
	 * @var FatturaElettronicaHeader 
	 */
	public $FatturaElettronicaHeader;

	/*
	* @var FatturaElettronicaBody[]
	 */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	public array $FatturaElettronicaBody = [];


}
