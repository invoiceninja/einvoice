<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\StatusType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ConditionType\Condition;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class CurrentStatus extends Data
{
	public string|Optional $ConditionCode;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ReferenceDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $ReferenceTime;

	#[DataCollectionOf('Description')]
	public string|Optional $Description;
	public string|Optional $StatusReasonCode;

	#[DataCollectionOf('StatusReason')]
	public string|Optional $StatusReason;
	public string|Optional $SequenceID;

	#[DataCollectionOf('Text')]
	public string|Optional $Text;
	public bool|Optional $IndicationIndicator;
	public string|Optional $Percent;
	public string|Optional $ReliabilityPercent;

	#[DataCollectionOf('Condition')]
	public Condition|Optional $Condition;
}
