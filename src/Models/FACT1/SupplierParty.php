<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\AccountingContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\DespatchContact;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\SellerContact;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SupplierParty extends Data
{
	public string|Optional $CustomerAssignedAccountID;

	/** @param array<AdditionalAccountID> $AdditionalAccountID */
	public array|Optional $AdditionalAccountID;
	public string|Optional $DataSendingCapability;
	public Party|Optional $Party;
	public DespatchContact|Optional $DespatchContact;
	public AccountingContact|Optional $AccountingContact;
	public SellerContact|Optional $SellerContact;
}
