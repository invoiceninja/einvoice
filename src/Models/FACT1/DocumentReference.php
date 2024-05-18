<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AttachmentType\Attachment;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Invoiceninja\Einvoice\Models\FACT1\ResultOfVerificationType\ResultOfVerification;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentReference extends Data
{
	public ?string $ID;
	public \boolean|Optional $CopyIndicator;
	public string|Optional $UUID;
	public Carbon|Optional $IssueDate;
	public \time|Optional $IssueTime;
	public string|Optional $DocumentTypeCode;
	public string|Optional $DocumentType;
	public string|Optional $XPath;
	public string|Optional $LanguageID;
	public string|Optional $LocaleCode;
	public string|Optional $VersionID;
	public string|Optional $DocumentStatusCode;
	public string|Optional $DocumentDescription;
	public Attachment|Optional $Attachment;
	public ValidityPeriod|Optional $ValidityPeriod;
	public IssuerParty|Optional $IssuerParty;
	public ResultOfVerification|Optional $ResultOfVerification;
}
