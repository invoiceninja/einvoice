<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AttachmentType\Attachment;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Invoiceninja\Einvoice\Models\FACT1\ResultOfVerificationType\ResultOfVerification;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class OriginalDocumentReference extends Data
{
	#[Required]
	#[Max(200)]
	#[Min(1)]
	public string $ID;
	public bool|Optional $CopyIndicator;
	public string|Optional $UUID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $IssueDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $IssueTime;
	public string|Optional $DocumentTypeCode;
	public string|Optional $DocumentType;

	#[DataCollectionOf('XPath')]
	public string|Optional $XPath;
	public string|Optional $LanguageID;
	public string|Optional $LocaleCode;
	public string|Optional $VersionID;
	public string|Optional $DocumentStatusCode;

	#[DataCollectionOf('DocumentDescription')]
	#[Max(100)]
	public string|Optional $DocumentDescription;
	public Attachment|Optional $Attachment;
	public ValidityPeriod|Optional $ValidityPeriod;
	public IssuerParty|Optional $IssuerParty;
	public ResultOfVerification|Optional $ResultOfVerification;
}
