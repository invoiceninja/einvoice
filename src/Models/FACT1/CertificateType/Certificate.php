<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\CertificateType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class Certificate extends Data
{
	#[Required]
	public string $ID;

	#[Required]
	public string $CertificateTypeCode;

	#[Required]
	public string $CertificateType;

	#[DataCollectionOf('string')]
	public string|Optional $Remarks;

	#[Required]
	public IssuerParty $IssuerParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference')]
	public DocumentReference|Optional $DocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature')]
	public Signature|Optional $Signature;
}
