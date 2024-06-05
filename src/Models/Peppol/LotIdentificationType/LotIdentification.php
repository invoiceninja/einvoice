<?php 

namespace Invoiceninja\Einvoice\Models\Peppol\LotIdentificationType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
use Invoiceninja\Einvoice\Models\Peppol\ItemPropertyType\AdditionalItemProperty;
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

class LotIdentification
{
	/** @var string */
	#[SerializedName('cbc:LotNumberID')]
	public string $LotNumberID;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ExpiryDate')]
	public DateTime $ExpiryDate;

	/** @var AdditionalItemProperty[] */
	#[SerializedName('cac:AdditionalItemProperty')]
	public array $AdditionalItemProperty;
}
