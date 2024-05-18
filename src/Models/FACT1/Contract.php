<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DeliveryType\ContractualDelivery;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ContractDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\NominationPeriod;
use Invoiceninja\Einvoice\Models\FACT1\PeriodType\ValidityPeriod;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Contract extends Data
{
	public string|Optional $ID;
	public Carbon|Optional $IssueDate;
	public \time|Optional $IssueTime;
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
