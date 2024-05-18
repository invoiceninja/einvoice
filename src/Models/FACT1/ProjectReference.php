<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\WorkPhaseReferenceType\WorkPhaseReference;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectReference extends Data
{
	public ?string $ID;
	public string|Optional $UUID;
	public Carbon|Optional $IssueDate;
	public WorkPhaseReference|Optional $WorkPhaseReference;
}
