<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ExternalReference extends Data
{
	public string|Optional $URI;
	public string|Optional $DocumentHash;
	public string|Optional $HashAlgorithmMethod;
	public Carbon|Optional $ExpiryDate;
	public \time|Optional $ExpiryTime;
	public string|Optional $MimeCode;
	public string|Optional $FormatCode;
	public string|Optional $EncodingCode;
	public string|Optional $CharacterSetCode;
	public string|Optional $FileName;
	public string|Optional $Description;
}
