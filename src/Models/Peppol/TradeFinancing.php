<?php 

namespace InvoiceNinja\EInvoice\Models\Peppol;

use DateTime;
use InvoiceNinja\EInvoice\Models\Peppol\ClauseType\Clause;
use InvoiceNinja\EInvoice\Models\Peppol\CodeType\FinancingInstrumentCode;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ContractDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\DocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\FinancialAccountType\FinancingFinancialAccount;
use InvoiceNinja\EInvoice\Models\Peppol\IdentifierType\ID;
use InvoiceNinja\EInvoice\Models\Peppol\PartyType\FinancingParty;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class TradeFinancing
{
	/** @var ID */
	#[SerializedName('cbc:ID')]
	public $ID;

	/** @var FinancingInstrumentCode */
	#[SerializedName('cbc:FinancingInstrumentCode')]
	public $FinancingInstrumentCode;

	/** @var ContractDocumentReference */
	#[SerializedName('cac:ContractDocumentReference')]
	public $ContractDocumentReference;

	/** @var DocumentReference[] */
	#[SerializedName('cac:DocumentReference')]
	public array $DocumentReference;

	/** @var FinancingParty */
	#[NotNull]
	#[NotBlank]
	#[Valid]
	#[SerializedName('cac:FinancingParty')]
	public $FinancingParty;

	/** @var FinancingFinancialAccount */
	#[SerializedName('cac:FinancingFinancialAccount')]
	public $FinancingFinancialAccount;

	/** @var Clause[] */
	#[SerializedName('cac:Clause')]
	public array $Clause;
}
