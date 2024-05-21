<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\WorkPhaseReferenceType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\WorkOrderDocumentReference;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class WorkPhaseReference extends Data
{
	public string|Optional $ID;
	public string|Optional $WorkPhaseCode;

	/** @param array<WorkPhase> $WorkPhase */
	public array|Optional $WorkPhase;
	public string|Optional $ProgressPercent;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $StartDate;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $EndDate;

	/** @param array<WorkOrderDocumentReference> $WorkOrderDocumentReference */
	public array|Optional $WorkOrderDocumentReference;
}
