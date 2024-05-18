<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\SignatureType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AttachmentType\DigitalSignatureAttachment;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\OriginalDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\SignatoryParty;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class Signature extends Data
{
	public ?string $ID;
	public string|Optional $Note;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ValidationDate;
	public \time|Optional $ValidationTime;
	public string|Optional $ValidatorID;
	public string|Optional $CanonicalizationMethod;
	public string|Optional $SignatureMethod;
	public SignatoryParty|Optional $SignatoryParty;
	public DigitalSignatureAttachment|Optional $DigitalSignatureAttachment;
	public OriginalDocumentReference|Optional $OriginalDocumentReference;
}
