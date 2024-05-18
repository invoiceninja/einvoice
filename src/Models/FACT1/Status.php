<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ConditionType\Condition;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Status extends Data
{
	public string|Optional $ConditionCode;
	public Carbon|Optional $ReferenceDate;
	public \time|Optional $ReferenceTime;
	public string|Optional $Description;
	public string|Optional $StatusReasonCode;
	public string|Optional $StatusReason;
	public string|Optional $SequenceID;
	public string|Optional $Text;
	public \boolean|Optional $IndicationIndicator;
	public string|Optional $Percent;
	public string|Optional $ReliabilityPercent;
	public Condition|Optional $Condition;
}
