<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ContractType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\ContractualDelivery;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ContractDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\NominationPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ForeignExchangeContract extends Data
{
	public string|Optional $ID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $IssueDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $IssueTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $NominationDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d\TH:i:s.uP')]
	public Carbon|Optional $NominationTime;
	public string|Optional $ContractTypeCode;
	public string|Optional $ContractType;

	/** @param array<Note> $Note */
	public array|Optional $Note;
	public string|Optional $VersionID;

	/** @param array<Description> $Description */
	public array|Optional $Description;
	public ValidityPeriod|Optional $ValidityPeriod;

	/** @param array<ContractDocumentReference> $ContractDocumentReference */
	public array|Optional $ContractDocumentReference;
	public NominationPeriod|Optional $NominationPeriod;
	public ContractualDelivery|Optional $ContractualDelivery;
}
