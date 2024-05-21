<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\FACT1\PhysicalAttributeType\PhysicalAttribute;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class ItemIdentification extends Data
{
	#[Required]
	public string $ID;
	public string|Optional $ExtendedID;
	public string|Optional $BarcodeSymbologyID;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\PhysicalAttributeType\PhysicalAttribute')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $PhysicalAttribute;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $MeasurementDimension;
	public IssuerParty|Optional $IssuerParty;
}
