<?php

namespace App\Repositories;

use App\Enums\UserEnums;
use App\Models\User;
use App\Traits\HasAuthToken;

class  UserRepository implements IRepository
{
    use HasAuthToken;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function all(){
        $data = User::query()->paginate(pageCount());
        return $data;
    }

    public function findById($id){
        $data = User::find($id);
        return $data;
    }

    public function create($data){
        $record = User::create($data);
        return $record;
    }
    public function update($id, $data){
        $rec = User::where("id", $id)->update($data);
        return $rec;
    }

    public function delete($id){
        $rec = User::where("id", $id)->delete();
        return $rec;
    }

    public function search($param){
        $rec = User::query()
            ->where("name", "LIKE", "%$param%")
            ->orWhere("email", "LIKE", "%$param%")
            ->orWhere("phone_number", "LIKE", "%$param%")
            ->orWhere("status", "=", $param)
            ->paginate(pageCount());
        return $rec;
    }

    public function getActiveUsers(){
        $records = User::active()->paginate(pageCount());
        return $records;
    }

    public function findByEmail($email){
        $data = User::where("email", $email)->first();
        return $data;
    }

}
