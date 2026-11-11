<?php

namespace InvoiceNinja\EInvoice\Validation\Profiles;

use InvoiceNinja\EInvoice\Models\Peppol\DeliveryType\Delivery;
use InvoiceNinja\EInvoice\Models\Peppol\DocumentReferenceType\ContractDocumentReference;
use InvoiceNinja\EInvoice\Models\Peppol\InvoiceLineType\InvoiceLine;
use InvoiceNinja\EInvoice\Models\Peppol\OrderReferenceType\OrderReference;
use InvoiceNinja\EInvoice\Models\Peppol\PeriodType\InvoicePeriod;
use InvoiceNinja\EInvoice\Models\Peppol\ProjectReferenceType\ProjectReference;
use InvoiceNinja\EInvoice\Validation\ValidationGroups;
use Symfony\Component\Validator\Constraints\Valid;

/** Inner Invoice settings payload; generated document fields are intentionally absent. */
class InvoiceSettingsProfile
{
    /** @var string */
    public string $BuyerReference;

    /** @var OrderReference */
    #[Valid(groups: [ValidationGroups::INVOICE_SETTINGS])]
    public OrderReference $OrderReference;

    /** @var ProjectReference[] */
    #[Valid(groups: [ValidationGroups::INVOICE_SETTINGS])]
    public array $ProjectReference;

    /** @var ContractDocumentReference[] */
    #[Valid(groups: [ValidationGroups::INVOICE_SETTINGS])]
    public array $ContractDocumentReference;

    /** @var InvoicePeriod[] */
    #[Valid(groups: [ValidationGroups::INVOICE_SETTINGS])]
    public array $InvoicePeriod;

    /** @var Delivery[] */
    #[Valid(groups: [ValidationGroups::INVOICE_SETTINGS])]
    public array $Delivery;

    /** @var InvoiceLine[] */
    #[Valid(groups: [ValidationGroups::INVOICE_SETTINGS])]
    public array $InvoiceLine;
}
