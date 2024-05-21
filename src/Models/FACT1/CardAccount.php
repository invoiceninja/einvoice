<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class CardAccount extends Data
{
	#[Required]
	public ?string $PrimaryAccountNumberID;

	#[Required]
	public ?string $NetworkID;
	public string|Optional $CardTypeCode;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ValidityStartDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ExpiryDate;
	public string|Optional $IssuerID;
	public string|Optional $IssueNumberID;
	public string|Optional $CV2ID;
	public string|Optional $CardChipCode;
	public string|Optional $ChipApplicationID;
	public string|Optional $HolderName;
}
