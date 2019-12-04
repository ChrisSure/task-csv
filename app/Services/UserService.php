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

    public function getStatistic(): array
    {
        return $this->userRepository->statistic;
    }

    public function findAll(): array
    {
        return $this->userRepository->findAll();
    }

    public function save(array $users) {
        $uidArray = [];
        foreach($users as $user) {
            $uidArray[] = $user->getUid();
            $userDb = $this->userRepository->find($user->getUid());
            if ($userDb != null) {
                if (strtotime($userDb->getDayChange() != strtotime($user->getDayChange()))) {
                    $this->userRepository->update[] = $user;
                }
            } else {
                $this->userRepository->new[] = $user;
            }
        }
        $this->userRepository->remove($uidArray);
        $this->userRepository->save();
    }
}