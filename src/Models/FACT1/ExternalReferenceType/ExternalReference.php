<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ExternalReferenceType;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ExternalReference extends Data
{
	public string|Optional $URI;
	public string|Optional $DocumentHash;
	public string|Optional $HashAlgorithmMethod;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ExpiryDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $ExpiryTime;
	public string|Optional $MimeCode;
	public string|Optional $FormatCode;
	public string|Optional $EncodingCode;
	public string|Optional $CharacterSetCode;
	public string|Optional $FileName;

	/** @param array<Description> $Description */
	public array|Optional $Description;
}
