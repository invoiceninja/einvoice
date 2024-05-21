<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AttachmentType\DigitalSignatureAttachment;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\OriginalDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\SignatoryParty;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class Signature extends Data
{
	#[Required]
	public string $ID;

	#[DataCollectionOf('string')]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $Note;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $ValidationDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $ValidationTime;
	public string|Optional $ValidatorID;
	public string|Optional $CanonicalizationMethod;
	public string|Optional $SignatureMethod;
	public SignatoryParty|Optional $SignatoryParty;
	public DigitalSignatureAttachment|Optional $DigitalSignatureAttachment;
	public OriginalDocumentReference|Optional $OriginalDocumentReference;
}
