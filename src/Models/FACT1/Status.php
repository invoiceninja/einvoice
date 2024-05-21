<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ConditionType\Condition;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class Status extends Data
{
	public string|Optional $ConditionCode;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ReferenceDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $ReferenceTime;

	/** @param array<Description> $Description */
	public array|Optional $Description;
	public string|Optional $StatusReasonCode;

	/** @param array<StatusReason> $StatusReason */
	public array|Optional $StatusReason;
	public string|Optional $SequenceID;

	/** @param array<Text> $Text */
	public array|Optional $Text;
	public bool|Optional $IndicationIndicator;
	public string|Optional $Percent;
	public string|Optional $ReliabilityPercent;

	/** @param array<Condition> $Condition */
	public array|Optional $Condition;
}
