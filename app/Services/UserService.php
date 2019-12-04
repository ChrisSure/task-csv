<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 13:41
 */

namespace App\Services;

use App\Repositories\UserRepository;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * @var UserRepository
     */
    public $userRepository;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * Get statistic
     * @return array
     */
    public function getStatistic(): array
    {
        return $this->userRepository->statistic;
    }

    /**
     * Find all users
     * @return array
     */
    public function findAll(): array
    {
        return $this->userRepository->findAll();
    }

    /**
     * Save users
     * @param array $users
     */
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