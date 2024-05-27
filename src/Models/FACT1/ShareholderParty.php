<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class ShareholderParty
{
	/** @var string */
	#[SerializedName('cbc:PartecipationPercent')]
	public string $PartecipationPercent;

	/** @var Party */
	#[SerializedName('cac:Party')]
	public $Party;
}
