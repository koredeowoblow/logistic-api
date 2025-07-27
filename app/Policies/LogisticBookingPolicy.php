<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use App\Models\LogisticBooking;

class LogisticBookingPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny($auth): bool
    {
        if ($auth instanceof Admin) {
            return true;
        }
        return false;
    }


    public function view($auth, LogisticBooking $booking): bool
    {
        // Admins can view all bookings
        if ($auth instanceof Admin && $auth->is_admin) {
            return true;
        }

        if ($auth instanceof User) {
            return $booking->user_id === $auth->id;
        }

        return false;
    }
}
