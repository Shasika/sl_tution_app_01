<?php

namespace App\Domain\Notifications\Listeners;

use App\Domain\Billing\Events\InvoiceCreated;

class SendNotificationOnInvoice
{
    public function handle(InvoiceCreated $event): void
    {
        // TODO: dispatch SMS/WhatsApp notification via channel interface.
    }
}
