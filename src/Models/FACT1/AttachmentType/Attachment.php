<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\AttachmentType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ExternalReferenceType\ExternalReference;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Attachment extends Data
{
	public \binary|Optional $EmbeddedDocumentBinaryObject;
	public ExternalReference|Optional $ExternalReference;
}
