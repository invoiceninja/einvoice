<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\LocationAddress;
use Invoiceninja\Einvoice\Models\FACT1\LineReferenceType\DependentLineReference;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DependentPriceReference extends Data
{
	public string|Optional $Percent;
	public LocationAddress|Optional $LocationAddress;
	public DependentLineReference|Optional $DependentLineReference;
}
