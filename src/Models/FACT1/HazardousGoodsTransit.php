<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\MaximumTemperature;
use Invoiceninja\Einvoice\Models\FACT1\TemperatureType\MinimumTemperature;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class HazardousGoodsTransit extends Data
{
	public string|Optional $TransportEmergencyCardCode;
	public string|Optional $PackingCriteriaCode;
	public string|Optional $HazardousRegulationCode;
	public string|Optional $InhalationToxicityZoneCode;
	public string|Optional $TransportAuthorizationCode;
	public MaximumTemperature|Optional $MaximumTemperature;
	public MinimumTemperature|Optional $MinimumTemperature;
}
