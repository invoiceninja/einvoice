<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\EmergencyProceduresCodeType\EmergencyProceduresCode;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class SecondaryHazard
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:PlacardNotation')]
	public string $PlacardNotation;

	/** @var string */
	#[SerializedName('cbc:PlacardEndorsement')]
	public string $PlacardEndorsement;

	/** @var EmergencyProceduresCode */
	#[SerializedName('cbc:EmergencyProceduresCode')]
	public $EmergencyProceduresCode;

	/** @var string */
	#[SerializedName('cbc:Extension')]
	public string $Extension;
}
