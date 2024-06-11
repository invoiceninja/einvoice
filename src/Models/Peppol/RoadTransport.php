<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use InvoiceNinja\EInvoice\Models\Peppol\LicensePlateIDType\LicensePlateID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class RoadTransport
{
	/** @var LicensePlateID */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cbc:LicensePlateID')]
	public $LicensePlateID;
}
