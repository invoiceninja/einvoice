<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\MandateDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\AgentParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\NotaryParty;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\WitnessParty;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class PowerOfAttorney extends Data
{
	public string|Optional $ID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $IssueDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $IssueTime;
	public string|Optional $Description;
	public NotaryParty|Optional $NotaryParty;
	public ?AgentParty $AgentParty;
	public WitnessParty|Optional $WitnessParty;
	public MandateDocumentReference|Optional $MandateDocumentReference;
}
