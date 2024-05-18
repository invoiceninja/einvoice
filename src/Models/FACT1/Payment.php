<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Payment extends Data
{
	public string|Optional $ID;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $PaidAmount;
	public Carbon|Optional $ReceivedDate;
	public Carbon|Optional $PaidDate;
	public \time|Optional $PaidTime;
	public string|Optional $InstructionID;
}
