<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\CodeType\HazardousRegulationCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\InhalationToxicityZoneCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\PackingCriteriaCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TransportAuthorizationCode;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\TransportEmergencyCardCode;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MaximumTemperature;
use InvoiceNinja\EInvoice\Models\Peppol\TemperatureType\MinimumTemperature;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class HazardousGoodsTransit
{
	/** @var TransportEmergencyCardCode */
	#[SerializedName('cbc:TransportEmergencyCardCode')]
	public $TransportEmergencyCardCode;

	/** @var PackingCriteriaCode */
	#[SerializedName('cbc:PackingCriteriaCode')]
	public $PackingCriteriaCode;

	/** @var HazardousRegulationCode */
	#[SerializedName('cbc:HazardousRegulationCode')]
	public $HazardousRegulationCode;

	/** @var InhalationToxicityZoneCode */
	#[SerializedName('cbc:InhalationToxicityZoneCode')]
	public $InhalationToxicityZoneCode;

	/** @var TransportAuthorizationCode */
	#[SerializedName('cbc:TransportAuthorizationCode')]
	public $TransportAuthorizationCode;

	/** @var MaximumTemperature */
	#[SerializedName('cac:MaximumTemperature')]
	public $MaximumTemperature;

	/** @var MinimumTemperature */
	#[SerializedName('cac:MinimumTemperature')]
	public $MinimumTemperature;
}
