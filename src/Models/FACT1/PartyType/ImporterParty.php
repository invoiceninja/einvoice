<?php 

namespace Invoiceninja\Einvoice\Models\FACT1\PartyType;

use DateTime;
use DateTimeInterface;
use Invoiceninja\Einvoice\Models\FACT1\AddressType\PostalAddress;
use Invoiceninja\Einvoice\Models\FACT1\ContactType\Contact;
use Invoiceninja\Einvoice\Models\FACT1\FinancialAccountType\FinancialAccount;
use Invoiceninja\Einvoice\Models\FACT1\LanguageType\Language;
use Invoiceninja\Einvoice\Models\FACT1\LocationType\PhysicalLocation;
use Invoiceninja\Einvoice\Models\FACT1\PartyIdentificationType\PartyIdentification;
use Invoiceninja\Einvoice\Models\FACT1\PartyLegalEntityType\PartyLegalEntity;
use Invoiceninja\Einvoice\Models\FACT1\PartyNameType\PartyName;
use Invoiceninja\Einvoice\Models\FACT1\PartyTaxSchemeType\PartyTaxScheme;
use Invoiceninja\Einvoice\Models\FACT1\PersonType\Person;
use Invoiceninja\Einvoice\Models\FACT1\PowerOfAttorneyType\PowerOfAttorney;
use Invoiceninja\Einvoice\Models\FACT1\ServiceProviderPartyType\ServiceProviderParty;
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

class ImporterParty
{
	/** @var bool */
	#[SerializedName('cbc:MarkCareIndicator')]
	public bool $MarkCareIndicator;

	/** @var bool */
	#[SerializedName('cbc:MarkAttentionIndicator')]
	public bool $MarkAttentionIndicator;

	/** @var string */
	#[SerializedName('cbc:WebsiteURI')]
	public string $WebsiteURI;

	/** @var string */
	#[SerializedName('cbc:LogoReferenceID')]
	public string $LogoReferenceID;

	/** @var string */
	#[SerializedName('cbc:EndpointID')]
	public string $EndpointID;

	/** @var string */
	#[SerializedName('cbc:IndustryClassificationCode')]
	public string $IndustryClassificationCode;

	/** @var PartyIdentification[] */
	#[SerializedName('cac:PartyIdentification')]
	public array $PartyIdentification = [];

	/** @var PartyName[] */
	#[SerializedName('cac:PartyName')]
	public array $PartyName = [];

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
	public array $PartyTaxScheme = [];

	/** @var PartyLegalEntity[] */
	#[SerializedName('cac:PartyLegalEntity')]
	public array $PartyLegalEntity = [];

	/** @var Contact */
	#[SerializedName('cac:Contact')]
	public $Contact;

	/** @var Person[] */
	#[SerializedName('cac:Person')]
	public array $Person = [];

	/** @var AgentParty */
	#[SerializedName('cac:AgentParty')]
	public $AgentParty;

	/** @var ServiceProviderParty[] */
	#[SerializedName('cac:ServiceProviderParty')]
	public array $ServiceProviderParty = [];

	/** @var PowerOfAttorney[] */
	#[SerializedName('cac:PowerOfAttorney')]
	public array $PowerOfAttorney = [];

	/** @var FinancialAccount */
	#[SerializedName('cac:FinancialAccount')]
	public $FinancialAccount;
}
