<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\ContactType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\CommunicationType\OtherCommunication;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Valid;

class SellerContact
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var string */
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var string */
	#[SerializedName('cbc:Telephone')]
	public string $Telephone;

	/** @var string */
	#[SerializedName('cbc:Telefax')]
	public string $Telefax;

	/** @var string */
	#[SerializedName('cbc:ElectronicMail')]
	public string $ElectronicMail;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var OtherCommunication[] */
	#[SerializedName('cac:OtherCommunication')]
	public array $OtherCommunication;
}
