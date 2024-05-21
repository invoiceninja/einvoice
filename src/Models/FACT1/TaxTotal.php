<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\TaxSubtotalType\TaxSubtotal;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TaxTotal extends Data
{
	#[Required]
	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $TaxAmount;

	#[\Spatie\LaravelData\Attributes\WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $RoundingAmount;
	public bool|Optional $TaxEvidenceIndicator;
	public bool|Optional $TaxIncludedIndicator;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxSubtotalType\TaxSubtotal')]
	public TaxSubtotal|Optional $TaxSubtotal;
}
