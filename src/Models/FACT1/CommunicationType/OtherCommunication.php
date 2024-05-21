<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\CommunicationType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OtherCommunication extends Data
{
	public string|Optional $ChannelCode;
	public string|Optional $Channel;
	public string|Optional $Value;
}
