<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\TransportMeansType;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\AirTransportType\AirTransport;
use Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension;
use Invoiceninja\Einvoice\Models\FACT1\MaritimeTransportType\MaritimeTransport;
use Invoiceninja\Einvoice\Models\FACT1\PartyType\OwnerParty;
use Invoiceninja\Einvoice\Models\FACT1\RailTransportType\RailTransport;
use Invoiceninja\Einvoice\Models\FACT1\RoadTransportType\RoadTransport;
use Invoiceninja\Einvoice\Models\FACT1\StowageType\Stowage;
use Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class ApplicableTransportMeans extends Data
{
	public string|Optional $JourneyID;
	public string|Optional $RegistrationNationalityID;

	#[DataCollectionOf('string')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $RegistrationNationality;
	public string|Optional $DirectionCode;
	public string|Optional $TransportMeansTypeCode;
	public string|Optional $TradeServiceCode;
	public Stowage|Optional $Stowage;
	public AirTransport|Optional $AirTransport;
	public RoadTransport|Optional $RoadTransport;
	public RailTransport|Optional $RailTransport;
	public MaritimeTransport|Optional $MaritimeTransport;
	public OwnerParty|Optional $OwnerParty;

	#[DataCollectionOf('Invoiceninja\Einvoice\Models\FACT1\DimensionType\MeasurementDimension')]
	#[WithCast('Invoiceninja\Einvoice\Models\Transformers\DataCollectionTransformer')]
	public DataCollection $MeasurementDimension;
}
