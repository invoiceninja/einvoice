<?php 

namespace Invoiceninja\Einvoice\Models\FACT1;

use Carbon\Carbon;
use Invoiceninja\Einvoice\Models\FACT1\BillingReferenceLineType\BillingReferenceLine;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\AdditionalDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\CreditNoteDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\DebitNoteDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\InvoiceDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\ReminderDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\SelfBilledCreditNoteDocumentReference;
use Invoiceninja\Einvoice\Models\FACT1\DocumentReferenceType\SelfBilledInvoiceDocumentReference;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class BillingReference extends Data
{
	public InvoiceDocumentReference|Optional $InvoiceDocumentReference;
	public SelfBilledInvoiceDocumentReference|Optional $SelfBilledInvoiceDocumentReference;
	public CreditNoteDocumentReference|Optional $CreditNoteDocumentReference;
	public SelfBilledCreditNoteDocumentReference|Optional $SelfBilledCreditNoteDocumentReference;
	public DebitNoteDocumentReference|Optional $DebitNoteDocumentReference;
	public ReminderDocumentReference|Optional $ReminderDocumentReference;
	public AdditionalDocumentReference|Optional $AdditionalDocumentReference;

	/** @param array<BillingReferenceLine> $BillingReferenceLine */
	public array|Optional $BillingReferenceLine;
}
