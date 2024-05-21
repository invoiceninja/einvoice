<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\ClauseType\Clause;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ContractDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\FinancialAccountType\FinancingFinancialAccount;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\FinancingParty;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TradeFinancing extends Data
{
	public string|Optional $ID;
	public string|Optional $FinancingInstrumentCode;
	public ContractDocumentReference|Optional $ContractDocumentReference;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DocumentReference')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DocumentReference|Optional $DocumentReference;

	#[Required]
	public FinancingParty $FinancingParty;
	public FinancingFinancialAccount|Optional $FinancingFinancialAccount;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\ClauseType\Clause')]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public Clause|Optional $Clause;
}
