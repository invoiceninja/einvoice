<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TradingTermsType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\ApplicableAddress;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class HaulageTradingTerms extends Data
{
	/** @param array<Information> $Information */
	public array|Optional $Information;
	public string|Optional $Reference;
	public ApplicableAddress|Optional $ApplicableAddress;
}
