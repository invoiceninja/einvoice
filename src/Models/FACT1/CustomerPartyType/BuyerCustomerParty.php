<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\CustomerPartyType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\AccountingContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\BuyerContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\DeliveryContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class BuyerCustomerParty extends Data
{
	public string|Optional $CustomerAssignedAccountID;
	public string|Optional $SupplierAssignedAccountID;

	#[DataCollectionOf('string')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public string|Optional $AdditionalAccountID;
	public Party|Optional $Party;
	public DeliveryContact|Optional $DeliveryContact;
	public AccountingContact|Optional $AccountingContact;
	public BuyerContact|Optional $BuyerContact;
}
