<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\SecondaryHazardType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
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

class SecondaryHazard
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:PlacardNotation')]
	public string $PlacardNotation;

	/** @var string */
	#[SerializedName('cbc:PlacardEndorsement')]
	public string $PlacardEndorsement;

	/** @var string */
	#[SerializedName('cbc:EmergencyProceduresCode')]
	public string $EmergencyProceduresCode;

	/** @var string */
	#[SerializedName('cbc:Extension')]
	public string $Extension;
}
