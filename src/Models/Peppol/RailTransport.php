<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\RailCarIDType\RailCarID;
use InvoiceNinja\EInvoice\Models\Peppol\TrainIDType\TrainID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class RailTransport
{
	/** @var TrainID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:TrainID')]
	public $TrainID;

	/** @var RailCarID */
	#[SerializedName('cbc:RailCarID')]
	public $RailCarID;
}
