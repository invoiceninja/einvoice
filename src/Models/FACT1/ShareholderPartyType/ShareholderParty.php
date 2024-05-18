<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ShareholderPartyType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\Party;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ShareholderParty extends Data
{
	public string|Optional $PartecipationPercent;
	public Party|Optional $Party;
}
