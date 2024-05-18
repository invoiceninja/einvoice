<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ItemPropertyType\AdditionalItemProperty;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class LotIdentification extends Data
{
	public string|Optional $LotNumberID;
	public Carbon|Optional $ExpiryDate;
	public AdditionalItemProperty|Optional $AdditionalItemProperty;
}
