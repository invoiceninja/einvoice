<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class ServiceFrequency
{
	/** @var string */
	#[SerializedName('cbc:WeekDayCode')]
	public string $WeekDayCode;
}