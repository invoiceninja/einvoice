<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ItemIdentificationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\IssuerParty;
use Invoiceninja\Einvoice\Models\FACT1\PhysicalAttributeType\PhysicalAttribute;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ManufacturersItemIdentification extends Data
{
	public ?string $ID;
	public string|Optional $ExtendedID;
	public string|Optional $BarcodeSymbologyID;
	public PhysicalAttribute|Optional $PhysicalAttribute;
	public MeasurementDimension|Optional $MeasurementDimension;
	public IssuerParty|Optional $IssuerParty;
}
