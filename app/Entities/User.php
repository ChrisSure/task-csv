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
    /**
     * @var int
     */
    private $uid;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $birthDay;

    /**
     * @var \DateTime
     */
    private $dayChange;

    /**
     * @param $uid
     * @param $firstName
     * @param $lastName
     * @param $description
     * @param $birthDay
     * @param $dayChange
     * @return $this
     */
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
     * @return int
     */
    public function getUid(): int
    {
        return $this->uid;
    }


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }


    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }


    /**
     * @return string
     */
    public function getDescription(): string
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