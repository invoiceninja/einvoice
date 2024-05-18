<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\Address;
use Invoiceninja\Einvoice\Models\FACT1\FinancialInstitutionType\FinancialInstitution;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Branch extends Data
{
	public string|Optional $ID;
	public string|Optional $Name;
	public FinancialInstitution|Optional $FinancialInstitution;
	public Address|Optional $Address;
}
