<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\FACT1\PhysicalAttributeType\PhysicalAttribute;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StandardItemIdentification extends Data
{
	#[Required]
	public string $ID;
	public string|Optional $ExtendedID;
	public string|Optional $BarcodeSymbologyID;

	#[DataCollectionOf('PhysicalAttribute')]
	public PhysicalAttribute|Optional $PhysicalAttribute;

	#[DataCollectionOf('MeasurementDimension')]
	public MeasurementDimension|Optional $MeasurementDimension;
	public IssuerParty|Optional $IssuerParty;
}
