<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\ResidenceAddress;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\Contact;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\IdentityDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType\FinancialAccount;
use InvoiceNinja\EInvoice\Models\Peppol\IDType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\NationalityIDType\NationalityID;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class Person
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

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

	/** @var NationalityID */
	#[SerializedName('cbc:NationalityID')]
	public $NationalityID;

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
