<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ClauseType\Clause;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ContractDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\FinancialAccountType\FinancingFinancialAccount;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\FinancingParty;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TradeFinancing extends Data
{
	public string|Optional $ID;
	public string|Optional $FinancingInstrumentCode;
	public ContractDocumentReference|Optional $ContractDocumentReference;

	/** @param array<DocumentReference> $DocumentReference */
	public array|Optional $DocumentReference;

	#[Required]
	public FinancingParty $FinancingParty;
	public FinancingFinancialAccount|Optional $FinancingFinancialAccount;

	/** @param array<Clause> $Clause */
	public array|Optional $Clause;
}
