<?php

namespace Invoiceninja\Einvoice\Models\Peppol;

use DateTime;
use Invoiceninja\Einvoice\Models\Peppol\BillingReferenceLineType\BillingReferenceLine;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\AdditionalDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\CreditNoteDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\DebitNoteDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\InvoiceDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\ReminderDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\SelfBilledCreditNoteDocumentReference;
use Invoiceninja\Einvoice\Models\Peppol\DocumentReferenceType\SelfBilledInvoiceDocumentReference;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\Date;

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
