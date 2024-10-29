<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2024. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace InvoiceNinja\EInvoice\Standards\Peppol;

class InvoiceCode
{

public array $codes = [
    "71" =>	"Request for payment", //Document/message issued by a creditor to a debtor to request payment of one or more invoices past due.
    "80" =>	"Debit note related to goods or services", //Debit information related to a transaction for goods or services to the relevant party.
    "82" =>	"Metered services invoice", //Document/message claiming payment for the supply of metered services (e.g., gas, electricity, etc.) supplied to a fixed meter whose consumption is measured over a period of time.
    "84" =>	"Debit note related to financial adjustments", //Document/message for providing debit information related to financial adjustments to the relevant party.
    "102" => "Tax notification", //Used to specify that the message is a tax notification.
    "218" => "Final payment request based on completion of work", //The final payment request of a series of payment requests submitted upon completion of all the work.
    "219" => "Payment request for completed units", //A request for payment for completed units.
    "331" => "Commercial invoice which includes a packing list", //Commercial transaction (invoice) will include a packing list.
    "380" => "Commercial invoice", //(1334) Document/message claiming payment for goods or services supplied under conditions agreed between seller and buyer.
    "382" => "Document/message in which a seller specifies the amount of commission, the percentage of the invoice amount, or some other basis for the calculation of the commission to which a sales agent is entitled.", // 
    "383" => "Debit note", // Document/message for providing debit information to the relevant party.
    "386" => "Prepayment invoice", // An invoice to pay amounts for goods and services in advance; these amounts will be subtracted from the final invoice.
    "388" => "Tax invoice", // An invoice for tax purposes.
    "393" => "Factored invoice", // Invoice assigned to a third party for collection.
    "395" => "Consignment invoice", // Commercial invoice that covers a transaction other than one involving a sale.
    "480" => "Invoice out of scope of tax", // An invoice issued by a party who is out of the scope of tax regulations and shall not collect tax on the invoice. The invoice should not contain tax details or information about the party tax registrations.
    "553" => "Forwarder's invoice discrepancy report", // Document/message reporting invoice discrepancies indentified by the forwarder.
    "575" => "Insurer's invoice", // Document/message issued by an insurer specifying the cost of an insurance which has been effected and claiming payment therefore.
    "623" => "Forwarder's invoice", //Invoice issued by a freight forwarder specifying services rendered and costs incurred and claiming payment therefore.
    "780" => "Freight invoice", //Document/message issued by a transport operation specifying freight costs and charges incurred for a transport operation and stating conditions of payment.
    "817" => "Claim notification", //Document notifying a claim.
    "870" => "Consular invoice", //Document/message to be prepared by an exporter in his country and presented to a diplomatic representation of the importing country for endorsement and subsequently to be presented by the importer in connection with the import of the goods described therein.
    "875" => "Partial construction invoice", //Partial invoice in the context of a specific construction project.
    "876" => "Partial final construction invoice", //Invoice concluding all previous partial construction invoices of a completed partial rendered service in the context of a specific construction project.
    "877" => "Final construction invoice", //Invoice concluding all previous partial invoices and partial final construction invoices in the context of a specific construction project.
];

}