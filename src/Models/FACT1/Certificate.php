<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Certificate extends Data
{
	public ?string $ID;
	public ?string $CertificateTypeCode;
	public ?string $CertificateType;
	public string|Optional $Remarks;
	public ?IssuerParty $IssuerParty;
	public DocumentReference|Optional $DocumentReference;
	public Signature|Optional $Signature;
}
