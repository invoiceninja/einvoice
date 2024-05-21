<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\SecondaryHazardType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class SecondaryHazard extends Data
{
	public string|Optional $ID;
	public string|Optional $PlacardNotation;
	public string|Optional $PlacardEndorsement;
	public string|Optional $EmergencyProceduresCode;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $Extension;
}
