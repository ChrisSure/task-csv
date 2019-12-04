<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 13:44
 */

namespace App\Repositories;

use App\Entities\User;
use Base\Pattern\ServiceLocator\App;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @var Base\Db\Pdo
     */
    private $pdo;

    /**
     * @var array
     */
    public $new = [];

    /**
     * @var array
     */
    public $update = [];

    /**
     * @var array
     */
    public $statistic = [];

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->pdo = App::$serviceLocator->get('db');
    }

    /**
     * Finf one user
     * @param $uid
     * @return User|null
     */
    public function find($uid): ?User
    {
        $stmt = $this->pdo->getConnect()->prepare('SELECT * FROM users WHERE uid = ?');
        $stmt->execute([$uid]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($result != null) {
            return (new User())->fill($result['uid'], $result['firstName'], $result['lastName'], $result['description'], $result['birthDay'], $result['dateChange']);
        }
        return null;
    }

    /**
     * Find all users
     * @return array
     */
    public function findAll(): array
    {
        $usersArray = [];
        $stmt = $this->pdo->getConnect()->prepare('SELECT * FROM users');
        $stmt->execute();
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            $usersArray[] = (new User())->fill($row['uid'], $row['firstName'], $row['lastName'], $row['description'], $row['birthDay'], $row['dateChange']);
        }
        return $usersArray;
    }

    /**
     * Save users
     */
    public function save(): void
    {
        $this->statistic['new'] = count($this->new);
        foreach ($this->new as $user) {
            $sql = "INSERT INTO users (uid, firstName, lastName, description, birthDay, dateChange) VALUES (?,?,?,?,?,?)";
            $stmt = $this->pdo->getConnect()->prepare($sql);
            $stmt->execute([$user->getUid(), $user->getFirstName(), $user->getLastName(), $user->getDescription(), $user->getBirthDay(), $user->getDayChange()]);
        }

        $this->statistic['update'] = count($this->update);
        foreach ($this->update as $user) {
            $sql = "UPDATE users SET uid = ?, firstName = ?, lastName = ?, description = ?, birthDay = ?, dateChange = ? WHERE uid = :uid";
            $stmt= $this->pdo->getConnect()->prepare($sql);
            $stmt->bindParam("uid", $user->getUid());
            $stmt->execute([$user->getUid(), $user->getFirstName(), $user->getLastName(), $user->getDescription(), $user->getBirthDay(), $user->getDayChange()]);
        }
    }

    /**
     * Remove users
     * @param array $uidArray
     */
    public function remove(array $uidArray): void
    {
        $arrayBase = $this->getUids();
        $result = array_diff($arrayBase, $uidArray);
        $this->statistic['remove'] = count($result);
        foreach ($result as $value) {
            $sql = "DELETE FROM users WHERE uid = :uid";
            $stmt= $this->pdo->getConnect()->prepare($sql);
            $stmt->bindParam("uid", $value);
            $stmt->execute();
        }

    }

    /**
     * Get uids users
     * @return array
     */
    private function getUids(): array
    {
        $arrayBase = [];
        $stmt = $this->pdo->getConnect()->prepare('SELECT * FROM users');
        $stmt->execute();
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            $arrayBase[] = $row['uid'];
        }
        return $arrayBase;
    }

}