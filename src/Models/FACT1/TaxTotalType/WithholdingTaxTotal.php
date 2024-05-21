<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TaxTotalType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\TaxSubtotalType\TaxSubtotal;
use Invoiceninja\Einvoice\Models\Transformers\FloatTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class WithholdingTaxTotal extends Data
{
	#[Required]
	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float $TaxAmount;

	#[WithTransformer('Invoiceninja\Einvoice\Models\Transformers\FloatTransformer')]
	public float|Optional $RoundingAmount;
	public bool|Optional $TaxEvidenceIndicator;
	public bool|Optional $TaxIncludedIndicator;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\TaxSubtotalType\TaxSubtotal')]
	public TaxSubtotal|Optional $TaxSubtotal;
}
