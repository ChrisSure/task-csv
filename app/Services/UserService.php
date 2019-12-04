<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 13:41
 */

namespace App\Services;

use App\Repositories\UserRepository;


class UserService
{
    public $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function save(array $users) {
        foreach($users as $user) {

        }
    }
}