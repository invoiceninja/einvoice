<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\CustomsDeclarationType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\PartyType\IssuerParty;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class CustomsDeclaration
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var IssuerParty */
	#[SerializedName('cac:IssuerParty')]
	public $IssuerParty;
}
