<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\MaritimeTransportType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\RegistryCertificateDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\RegistryPortLocation;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class MaritimeTransport extends Data
{
	public string|Optional $VesselID;
	public string|Optional $VesselName;
	public string|Optional $RadioCallSignID;

	#[DataCollectionOf('ShipsRequirements')]
	public string|Optional $ShipsRequirements;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $GrossTonnageMeasure;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $NetTonnageMeasure;
	public RegistryCertificateDocumentReference|Optional $RegistryCertificateDocumentReference;
	public RegistryPortLocation|Optional $RegistryPortLocation;
}
