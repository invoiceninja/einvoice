<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PersonType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\ResidenceAddress;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\Contact;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\IdentityDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\FinancialAccountType\FinancialAccount;
use Invoiceninja\Einvoice\Models\Normalizers\DecimalPrecision;
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

class PassengerPerson
{
	/** @var string */
	#[SerializedName('cbc:ID')]
	public string $ID;

	/** @var string */
	#[SerializedName('cbc:FirstName')]
	public string $FirstName;

	/** @var string */
	#[SerializedName('cbc:FamilyName')]
	public string $FamilyName;

	/** @var string */
	#[SerializedName('cbc:Title')]
	public string $Title;

	/** @var string */
	#[SerializedName('cbc:MiddleName')]
	public string $MiddleName;

	/** @var string */
	#[SerializedName('cbc:OtherName')]
	public string $OtherName;

	/** @var string */
	#[SerializedName('cbc:NameSuffix')]
	public string $NameSuffix;

	/** @var string */
	#[SerializedName('cbc:JobTitle')]
	public string $JobTitle;

	/** @var string */
	#[SerializedName('cbc:NationalityID')]
	public string $NationalityID;

	/** @var string */
	#[SerializedName('cbc:GenderCode')]
	public string $GenderCode;

	/** @var DateTime */
	#[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'])]
	#[SerializedName('cbc:BirthDate')]
	public DateTime $BirthDate;

	/** @var string */
	#[SerializedName('cbc:BirthplaceName')]
	public string $BirthplaceName;

	/** @var string */
	#[SerializedName('cbc:OrganizationDepartment')]
	public string $OrganizationDepartment;

	/** @var Contact */
	#[SerializedName('cac:Contact')]
	public $Contact;

	/** @var FinancialAccount */
	#[SerializedName('cac:FinancialAccount')]
	public $FinancialAccount;

	/** @var IdentityDocumentReference[] */
	#[SerializedName('cac:IdentityDocumentReference')]
	public array $IdentityDocumentReference;

	/** @var ResidenceAddress */
	#[SerializedName('cac:ResidenceAddress')]
	public $ResidenceAddress;
}
