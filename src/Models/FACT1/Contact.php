<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Invoiceninja\Einvoice\Models\FACT1\CommunicationType\OtherCommunication;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Length;

class Contact
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[Length(min: null, max: 100)]
	#[SerializedName('cbc:Name')]
	public string $Name;

	/** @var string */
	#[Length(min: null, max: 100)]
	#[SerializedName('cbc:Telephone')]
	public string $Telephone;

	/** @var string */
	#[SerializedName('cbc:Telefax')]
	public string $Telefax;

	/** @var string */
	#[Length(min: null, max: 100)]
	#[SerializedName('cbc:ElectronicMail')]
	public string $ElectronicMail;

	/** @var string */
	#[SerializedName('cbc:Note')]
	public string $Note;

	/** @var OtherCommunication[] */
	#[SerializedName('cac:OtherCommunication')]
	public array $OtherCommunication = [];
}
