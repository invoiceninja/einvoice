<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\MandateDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\AgentParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\NotaryParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\WitnessParty;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PowerOfAttorney extends Data
{
	public string|Optional $ID;
	public Carbon|Optional $IssueDate;
	public \time|Optional $IssueTime;
	public string|Optional $Description;
	public NotaryParty|Optional $NotaryParty;
	public ?AgentParty $AgentParty;
	public WitnessParty|Optional $WitnessParty;
	public MandateDocumentReference|Optional $MandateDocumentReference;
}
