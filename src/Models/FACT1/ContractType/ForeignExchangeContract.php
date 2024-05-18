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
	public \time|Optional $IssueTime;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $NominationDate;
	public \time|Optional $NominationTime;
	public string|Optional $ContractTypeCode;
	public string|Optional $ContractType;
	public string|Optional $Note;
	public string|Optional $VersionID;
	public string|Optional $Description;
	public ValidityPeriod|Optional $ValidityPeriod;
	public ContractDocumentReference|Optional $ContractDocumentReference;
	public NominationPeriod|Optional $NominationPeriod;
	public ContractualDelivery|Optional $ContractualDelivery;
}
