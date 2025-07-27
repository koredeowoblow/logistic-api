<?php 
namespace App\Services;

use App\Enums\UserEnums;
use App\Repositories\UserRepository;

class UserService {

    public $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAllUsers($params = []){
        $param = $params["search"] ?? null;
        if($param)
            $data = $this->userRepo->search($param);
        else
            $data = $this->userRepo->all();
        return $data;
    }

    public function getSingleUser($userid){
        $data = $this->userRepo->findById($userid);
        return $data;
    }
}