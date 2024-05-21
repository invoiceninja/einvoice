<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\SupplierPartyType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\AccountingContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\DespatchContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\SellerContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class SupplierParty extends Data
{
	public string|Optional $CustomerAssignedAccountID;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $AdditionalAccountID;
	public string|Optional $DataSendingCapability;
	public Party|Optional $Party;
	public DespatchContact|Optional $DespatchContact;
	public AccountingContact|Optional $AccountingContact;
	public SellerContact|Optional $SellerContact;
}
