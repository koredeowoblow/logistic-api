<?php

namespace App\Services;

use App\Exceptions\FailedProcessException;
use App\Enums\StatusCodeEnums;
use App\Repositories\LogisticBookingRepository;
use App\Enums\LogisticBookingEnums;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Notifications\BookingStatusChanged;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Gate;
use App\Models\LogisticBooking;



class LogisticBookingService
{
    protected $logisticBookingRepository;

    public function __construct(LogisticBookingRepository $logisticBookingRepository)
    {
        $this->logisticBookingRepository = $logisticBookingRepository;
    }
    public function createBooking(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        $data = $this->logisticBookingRepository->create($data);
        if (!$data) {
            throw new FailedProcessException('Booking creation failed', StatusCodeEnums::FAILED);
        }
        return $data;
    }
    public function updateBooking($id, array $data)
    {
        $booking = $this->logisticBookingRepository->findById($id);

        if (!$booking) {
            throw new FailedProcessException('Booking not found', StatusCodeEnums::FAILED);
        }

        if ($booking->status !== LogisticBookingEnums::DRAFT) {

            throw new FailedProcessException('Only bookings in draft status can be updated', StatusCodeEnums::FAILED);
        }
        $auth = currentAuthUser();
        Gate::forUser($auth)->authorize('view', $booking);
        $updatedBooking = $this->logisticBookingRepository->update($id, $data);

        if (!$updatedBooking) {

            throw new FailedProcessException('Booking update failed', StatusCodeEnums::FAILED);
        }

        // Notify the user about the booking status change
        $user = User::find($booking->user_id);
        if ($user) {
            Notification::send($user, new BookingStatusChanged($id, $data['status']));
        }

        return $updatedBooking;
    }
    public function getBookingById($id)
    {
        $auth = currentAuthUser();
        $data = $this->logisticBookingRepository->findById($id);
        Gate::forUser($auth)->authorize('view', $data);

        if (!$data) {
            throw new FailedProcessException('Booking not found', StatusCodeEnums::FAILED);
        }
        return $data;
    }
    public function deleteBooking($id)
    {
        $auth = currentAuthUser();
        //checking if ID is valid
        $booking = $this->logisticBookingRepository->findById($id);

        if (!$booking) {
            throw new FailedProcessException('Booking not found', StatusCodeEnums::FAILED);
        }
        Gate::ForUser($auth)->authorize('view', $booking);

        $data = $this->logisticBookingRepository->delete($id);
        if (!$data) {
            throw new FailedProcessException('Booking Deletion failed', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function getAllBookings(?string $status = null)
    {
        $user = currentAuthUser();
        $data = $this->logisticBookingRepository->adminAll($status);
        throw_if($data->isEmpty(), new FailedProcessException('No bookings found', StatusCodeEnums::FAILED));
        return $data;
    }



    public function searchBookings($param)
    {
        $data = $this->logisticBookingRepository->search($param);
        if (!$data) {
            throw new FailedProcessException('Booking not found', StatusCodeEnums::FAILED);
        }
        return $data;
    }
    public function getBookingsByUserId($userId)
    {
        $auth = currentAuthUser();
        $data = $this->logisticBookingRepository->findByUserId($userId);
        if (!$data) {
            throw new FailedProcessException('Booking not found for this user', StatusCodeEnums::FAILED);
        }
        Gate::forUser($auth)->authorize('view', $data->first()); //the user will only fetch his own booking or if he is an admin

        return $data;
    }
    public function changeStatus($id, $status)
    {
        $data = $this->logisticBookingRepository->findById($id);

        if ($data['status'] != LogisticBookingEnums::DRAFT) {
            return $this->logisticBookingRepository->updateStatus($id, $status);
        }

        throw new FailedProcessException('Booking is still in user draft', StatusCodeEnums::FAILED);
    }
}
