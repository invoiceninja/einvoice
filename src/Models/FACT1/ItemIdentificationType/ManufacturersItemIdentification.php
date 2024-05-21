<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\FACT1\PhysicalAttributeType\PhysicalAttribute;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ManufacturersItemIdentification extends Data
{
	#[Required]
	public string $ID;
	public string|Optional $ExtendedID;
	public string|Optional $BarcodeSymbologyID;

	/** @param array<PhysicalAttribute> $PhysicalAttribute */
	public array|Optional $PhysicalAttribute;

	/** @param array<MeasurementDimension> $MeasurementDimension */
	public array|Optional $MeasurementDimension;
	public IssuerParty|Optional $IssuerParty;
}
