<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\WorkOrderDocumentReference;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WorkPhaseReference extends Data
{
	public string|Optional $ID;
	public string|Optional $WorkPhaseCode;
	public string|Optional $WorkPhase;
	public string|Optional $ProgressPercent;
	public Carbon|Optional $StartDate;
	public Carbon|Optional $EndDate;
	public WorkOrderDocumentReference|Optional $WorkOrderDocumentReference;
}
