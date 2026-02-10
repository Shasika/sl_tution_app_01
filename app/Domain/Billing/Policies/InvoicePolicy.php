<?php

namespace App\Domain\Billing\Policies;

use App\Domain\Users\Models\User;

class InvoicePolicy
{
    public function view(User $user): bool
    {
        return in_array($user->role, ['super_admin', 'institute_admin', 'cashier'], true);
    }

    public function void(User $user): bool
    {
        return in_array($user->role, ['super_admin', 'institute_admin'], true);
    }
}
