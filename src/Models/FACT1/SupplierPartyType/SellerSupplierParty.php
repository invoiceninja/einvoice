<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\SupplierPartyType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\AccountingContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\DespatchContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\SellerContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SellerSupplierParty extends Data
{
	public string|Optional $CustomerAssignedAccountID;

	#[DataCollectionOf('AdditionalAccountID')]
	public string|Optional $AdditionalAccountID;
	public string|Optional $DataSendingCapability;
	public Party|Optional $Party;
	public DespatchContact|Optional $DespatchContact;
	public AccountingContact|Optional $AccountingContact;
	public SellerContact|Optional $SellerContact;
}
