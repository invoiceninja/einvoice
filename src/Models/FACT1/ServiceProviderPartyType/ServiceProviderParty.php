<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ServiceProviderPartyType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\SellerContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class ServiceProviderParty extends Data
{
	public string|Optional $ID;
	public string|Optional $ServiceTypeCode;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $ServiceType;

	#[Required]
	public Party $Party;
	public SellerContact|Optional $SellerContact;
}
