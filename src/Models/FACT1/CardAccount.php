<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CardAccount extends Data
{
	public ?string $PrimaryAccountNumberID;
	public ?string $NetworkID;
	public string|Optional $CardTypeCode;
	public Carbon|Optional $ValidityStartDate;
	public Carbon|Optional $ExpiryDate;
	public string|Optional $IssuerID;
	public string|Optional $IssueNumberID;
	public string|Optional $CV2ID;
	public string|Optional $CardChipCode;
	public string|Optional $ChipApplicationID;
	public string|Optional $HolderName;
}
