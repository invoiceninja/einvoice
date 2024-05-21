<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\AttachmentType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ExternalReferenceType\ExternalReference;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DigitalSignatureAttachment extends Data
{
	public \binary|Optional $EmbeddedDocumentBinaryObject;
	public ExternalReference|Optional $ExternalReference;
}
