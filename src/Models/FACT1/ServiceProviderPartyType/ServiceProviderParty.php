<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ServiceProviderPartyType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\SellerContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class ServiceProviderParty extends Data
{
	public string|Optional $ID;
	public string|Optional $ServiceTypeCode;

	#[DataCollectionOf('ServiceType')]
	public string|Optional $ServiceType;

	#[Required]
	public Party $Party;
	public SellerContact|Optional $SellerContact;
}
