<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 13:00
 */

namespace App\Entities;


class User
{
    private $uid;

    private $firstName;

    private $lastName;

    private $description;

    private $birthDay;

    private $dayChange;

    public function fill($uid, $firstName, $lastName, $description, $birthDay, $dayChange): self
    {
        $this->uid = $uid;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->description = $description;
        $this->birthDay = $birthDay;
        $this->dayChange = $dayChange;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }


    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }


    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }


    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * @return mixed
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }


    /**
     * @return mixed
     */
    public function getDayChange()
    {
        return $this->dayChange;
    }

}