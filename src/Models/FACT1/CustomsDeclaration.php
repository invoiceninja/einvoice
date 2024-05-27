<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class CustomsDeclaration
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var IssuerParty */
	#[SerializedName('cac:IssuerParty')]
	public $IssuerParty;
}
