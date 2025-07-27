<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Traits\HasAuthToken;

class AdminRepository implements IRepository
{
    use HasAuthToken;

    public function all(){

    }
    public function findById($id){

    }
    public function create($data){

    }
    public function update($id, $data){
        return Admin::where("id", $id)->update($data);
    }
    public function delete($id){

    }
    public function search($param){

    }
    public function findByEmail($email){
        return Admin::where("email", $email)->first();
    }
}
