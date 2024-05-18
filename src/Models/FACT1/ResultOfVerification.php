<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\SignatoryParty;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ResultOfVerification extends Data
{
	public string|Optional $ValidatorID;
	public string|Optional $ValidationResultCode;
	public Carbon|Optional $ValidationDate;
	public \time|Optional $ValidationTime;
	public string|Optional $ValidateProcess;
	public string|Optional $ValidateTool;
	public string|Optional $ValidateToolVersion;
	public SignatoryParty|Optional $SignatoryParty;
}
