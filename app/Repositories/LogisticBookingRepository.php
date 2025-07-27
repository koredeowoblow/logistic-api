<?php

namespace App\Repositories;

use App\Enums\LogisticBookingEnums;
use App\Models\LogisticBooking;

class LogisticBookingRepository implements IRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function all(?string $status = null)
    {
       $query = LogisticBooking::with(['user', 'location', 'transportMode']);

        if ($status) {
            $query->where('status', $status);
        }

        return $query->paginate(pageCount());
    }

    public function findById($id)
    {
        $data = LogisticBooking::with(['user', 'location', 'transportMode'])->findOrFail($id);
        return $data;
    }

    public function create($data)
    {
        $record = LogisticBooking::create($data);
        return $record;
    }

    public function update($id, $data)
    {
        $record = LogisticBooking::findOrFail($id);
        $record->update($data); //updated the field and return the model instance
        return $record;
    }

    public function delete($id)
    {
        $rec = LogisticBooking::where("id", $id)->delete();
        return $rec;
    }

    public function search($param)
    {
        $rec = LogisticBooking::query()
            ->where("goods_name", "LIKE", "%$param%")
            ->orWhere("status", "=", $param)
            ->orWhere("receiver_name", "LIKE", "%$param%")
            ->get();
        return $rec;
    }

    public function findByUserId($userId)
    {
        $data = LogisticBooking::with(['user', 'location', 'transportMode'])
            ->where("user_id", $userId)
            ->paginate(pageCount());
        return $data;
    }
    public function updateStatus($id, $status)
    {
        $booking = LogisticBooking::findOrFail($id);
        $booking->status = $status;
        $booking->save();

        return $booking;
    }
    public function adminAll(?string $status = null)
    {
        $query = LogisticBooking::with(['user', 'location', 'transportMode']);

        if ($status) {
            $query->where('status', $status);
        }

        return $query->paginate(pageCount());
    }
}
