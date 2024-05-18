<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\Address;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FinancialInstitution extends Data
{
	public string|Optional $ID;
	public string|Optional $Name;
	public Address|Optional $Address;
}
