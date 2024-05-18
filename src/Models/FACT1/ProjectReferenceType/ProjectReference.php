<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\ProjectReferenceType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\WorkPhaseReferenceType\WorkPhaseReference;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ProjectReference extends Data
{
	public ?string $ID;
	public string|Optional $UUID;

	#[WithTransformer('Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer', format: 'Y-m-d')]
	public Carbon|Optional $IssueDate;
	public WorkPhaseReference|Optional $WorkPhaseReference;
}
