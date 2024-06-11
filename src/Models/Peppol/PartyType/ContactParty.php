<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol\PartyType;

use DateTime;
use DateTimeInterface;
use InvoiceNinja\EInvoice\Models\Normalizers\DecimalPrecision;
use InvoiceNinja\EInvoice\Models\Peppol\AddressType\PostalAddress;
use InvoiceNinja\EInvoice\Models\Peppol\ContactType\Contact;
use InvoiceNinja\EInvoice\Models\Peppol\EndpointIDType\EndpointID;
use InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType\FinancialAccount;
use InvoiceNinja\EInvoice\Models\Peppol\LanguageType\Language;
use InvoiceNinja\EInvoice\Models\Peppol\LocationType\PhysicalLocation;
use InvoiceNinja\EInvoice\Models\Peppol\LogoReferenceIDType\LogoReferenceID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyIdentificationType\PartyIdentification;
use InvoiceNinja\EInvoice\Models\Peppol\PartyLegalEntityType\PartyLegalEntity;
use InvoiceNinja\EInvoice\Models\Peppol\PartyNameType\PartyName;
use InvoiceNinja\EInvoice\Models\Peppol\PartyTaxSchemeType\PartyTaxScheme;
use InvoiceNinja\EInvoice\Models\Peppol\PersonType\Person;
use InvoiceNinja\EInvoice\Models\Peppol\PowerOfAttorneyType\PowerOfAttorney;
use InvoiceNinja\EInvoice\Models\Peppol\ServiceProviderPartyType\ServiceProviderParty;
use InvoiceNinja\EInvoice\Models\Peppol\WebsiteURIType\WebsiteURI;
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

class ContactParty
{
	/** @var bool */
	#[SerializedName('cbc:MarkCareIndicator')]
	public bool $MarkCareIndicator;

	/** @var bool */
	#[SerializedName('cbc:MarkAttentionIndicator')]
	public bool $MarkAttentionIndicator;

	/** @var WebsiteURI */
	#[SerializedName('cbc:WebsiteURI')]
	public $WebsiteURI;

	/** @var LogoReferenceID */
	#[SerializedName('cbc:LogoReferenceID')]
	public $LogoReferenceID;

	/** @var EndpointID */
	#[SerializedName('cbc:EndpointID')]
	public $EndpointID;

	/** @var string */
	#[SerializedName('cbc:IndustryClassificationCode')]
	public string $IndustryClassificationCode;

	/** @var PartyIdentification[] */
	#[SerializedName('cac:PartyIdentification')]
	public array $PartyIdentification;

	/** @var PartyName[] */
	#[SerializedName('cac:PartyName')]
	public array $PartyName;

	/** @var Language */
	#[SerializedName('cac:Language')]
	public $Language;

	/** @var PostalAddress */
	#[SerializedName('cac:PostalAddress')]
	public $PostalAddress;

	/** @var PhysicalLocation */
	#[SerializedName('cac:PhysicalLocation')]
	public $PhysicalLocation;

	/** @var PartyTaxScheme[] */
	#[SerializedName('cac:PartyTaxScheme')]
	public array $PartyTaxScheme;

	/** @var PartyLegalEntity[] */
	#[SerializedName('cac:PartyLegalEntity')]
	public array $PartyLegalEntity;

	/** @var Contact */
	#[SerializedName('cac:Contact')]
	public $Contact;

	/** @var Person[] */
	#[SerializedName('cac:Person')]
	public array $Person;

	/** @var AgentParty */
	#[SerializedName('cac:AgentParty')]
	public $AgentParty;

	/** @var ServiceProviderParty[] */
	#[SerializedName('cac:ServiceProviderParty')]
	public array $ServiceProviderParty;

	/** @var PowerOfAttorney[] */
	#[SerializedName('cac:PowerOfAttorney')]
	public array $PowerOfAttorney;

	/** @var FinancialAccount */
	#[SerializedName('cac:FinancialAccount')]
	public $FinancialAccount;
}
