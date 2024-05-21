<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\AccountingContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\BuyerContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\DeliveryContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomerParty extends Data
{
	public string|Optional $CustomerAssignedAccountID;
	public string|Optional $SupplierAssignedAccountID;

	/** @param array<AdditionalAccountID> $AdditionalAccountID */
	public array|Optional $AdditionalAccountID;
	public Party|Optional $Party;
	public DeliveryContact|Optional $DeliveryContact;
	public AccountingContact|Optional $AccountingContact;
	public BuyerContact|Optional $BuyerContact;
}
