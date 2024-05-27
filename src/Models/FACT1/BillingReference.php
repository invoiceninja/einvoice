<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use DateTime;
use Invoiceninja\Einvoice\Models\FACT1\BillingReferenceLineType\BillingReferenceLine;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\AdditionalDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\CreditNoteDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DebitNoteDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\InvoiceDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ReminderDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\SelfBilledCreditNoteDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\SelfBilledInvoiceDocumentReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;

class BillingReference
{
	/** @var InvoiceDocumentReference */
	#[SerializedName('cac:InvoiceDocumentReference')]
	public $InvoiceDocumentReference;

	/** @var SelfBilledInvoiceDocumentReference */
	#[SerializedName('cac:SelfBilledInvoiceDocumentReference')]
	public $SelfBilledInvoiceDocumentReference;

	/** @var CreditNoteDocumentReference */
	#[SerializedName('cac:CreditNoteDocumentReference')]
	public $CreditNoteDocumentReference;

	/** @var SelfBilledCreditNoteDocumentReference */
	#[SerializedName('cac:SelfBilledCreditNoteDocumentReference')]
	public $SelfBilledCreditNoteDocumentReference;

	/** @var DebitNoteDocumentReference */
	#[SerializedName('cac:DebitNoteDocumentReference')]
	public $DebitNoteDocumentReference;

	/** @var ReminderDocumentReference */
	#[SerializedName('cac:ReminderDocumentReference')]
	public $ReminderDocumentReference;

	/** @var AdditionalDocumentReference */
	#[SerializedName('cac:AdditionalDocumentReference')]
	public $AdditionalDocumentReference;

	/** @var BillingReferenceLine[] */
	#[SerializedName('cac:BillingReferenceLine')]
	public array $BillingReferenceLine;
}
