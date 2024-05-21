<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\RegistryCertificateDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\RegistryPortLocation;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class MaritimeTransport extends Data
{
	public string|Optional $VesselID;
	public string|Optional $VesselName;
	public string|Optional $RadioCallSignID;

	#[DataCollectionOf('ShipsRequirements')]
	public string|Optional $ShipsRequirements;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossTonnageMeasure;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetTonnageMeasure;
	public RegistryCertificateDocumentReference|Optional $RegistryCertificateDocumentReference;
	public RegistryPortLocation|Optional $RegistryPortLocation;
}
