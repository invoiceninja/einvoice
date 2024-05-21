<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\CertificateType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\FACT1\SignatureType\Signature;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Certificate extends Data
{
	#[Required]
	public string $ID;

	#[Required]
	public string $CertificateTypeCode;

	#[Required]
	public string $CertificateType;

	/** @param array<Remarks> $Remarks */
	public array|Optional $Remarks;

	#[Required]
	public IssuerParty $IssuerParty;

	/** @param array<DocumentReference> $DocumentReference */
	public array|Optional $DocumentReference;

	/** @param array<Signature> $Signature */
	public array|Optional $Signature;
}
