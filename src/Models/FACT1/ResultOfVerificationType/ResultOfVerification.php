<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ResultOfVerificationType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\SignatoryParty;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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

class ResultOfVerification
{
	/** @var string */
	#[SerializedName('cbc:ValidatorID')]
	public string $ValidatorID;

	/** @var string */
	#[SerializedName('cbc:ValidationResultCode')]
	public string $ValidationResultCode;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:ValidationDate')]
	public DateTime $ValidationDate;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d\TH:i:s.uP'])]
	#[SerializedName('cbc:ValidationTime')]
	public DateTime $ValidationTime;

	/** @var string */
	#[SerializedName('cbc:ValidateProcess')]
	public string $ValidateProcess;

	/** @var string */
	#[SerializedName('cbc:ValidateTool')]
	public string $ValidateTool;

	/** @var string */
	#[SerializedName('cbc:ValidateToolVersion')]
	public string $ValidateToolVersion;

	/** @var SignatoryParty */
	#[SerializedName('cac:SignatoryParty')]
	public $SignatoryParty;
}
