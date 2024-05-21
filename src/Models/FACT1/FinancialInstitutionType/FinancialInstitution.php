<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\FinancialInstitutionType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\Address;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FinancialInstitution extends Data
{
	public string|Optional $ID;
	public string|Optional $Name;
	public Address|Optional $Address;
}
